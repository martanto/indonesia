<?php

namespace Martanto\Indonesia\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Martanto\Indonesia\Interfaces\IndonesiaSeederInterface;

abstract class BaseIndonesiaSeeder extends Seeder implements IndonesiaSeederInterface
{
    /**
     * The console command description.
     */
    protected string $description = 'Seeding Indonesia administrative';

    /**
     * JSON loaded from file
     */
    public array $json;

    /**
     * Load JSON file as an array
     */
    public function json(
        string $name,
        string|int|null $keyOne = null,
        string|int|null $keyTwo = null
    ): array {
        $json = file_get_contents(
            filename: __DIR__."/../../storage/app/json/$name.json"
        );

        $this->json = json_decode(
            json: $json,
            associative: true
        );

        return match (true) {
            ! is_null($keyTwo) => $this->json = $this->json[$keyOne][$keyTwo],
            ! is_null($keyOne) => $this->json = $this->json[$keyOne],
            default => $this->json,
        };

    }

    /**
     * Load JSON file as Collection
     *
     * @throws ValidationException
     */
    public function collection(
        string $name,
        string|int|null $keyOne = null,
        string|int|null $keyTwo = null
    ): Collection {
        return collect($this->json($name, $keyOne, $keyTwo));
    }

    /**
     * Read resources from Storage
     *
     * @return (string|int|Collection)[]
     *
     * @throws ValidationException
     */
    public function readFromJson(string $name): array
    {
        $loaded = $this->collection($name)
            ->transform(callback: fn ($loaded) => $this->data($loaded));

        return [
            'name' => $name,
            'count' => $loaded->count(),
            'data' => $loaded->chunk(500),
        ];
    }

    /**
     * Seeding data
     */
    public function seed(array $json, Model $model): void
    {
        $bar = $this->command->getOutput()->createProgressBar($json['count']);
        $bar->start();
        $json['data']->each(function ($chunked) use ($model, $bar) {
            $model::insert($chunked->toArray());
            $bar->advance(count($chunked));
        });
        $bar->finish();
    }

    /**
     * Handling run for seeding
     */
    public function handle(string $jsonFile, Model $model): void
    {
        $this->command->info(PHP_EOL.$this->description);

        collect([
            $jsonFile,
        ])->map(function ($name) {
            return $this->readFromJson($name);
        })->each(function ($json) use ($model) {
            $this->seed($json, $model);
            $this->command->info(' Done!');
        });
    }
}
