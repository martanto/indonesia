<?php

namespace Martanto\Indonesia\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Martanto\Indonesia\Interfaces\IndonesiaSeederInterface;

abstract class IndonesiaSeeder extends Seeder implements IndonesiaSeederInterface
{
    /**
     * The console command description.
     */
    protected string $description = 'Seeding Indonesia administrative';

    /**
     * JSON loaded from file
     */
    protected array $json;

    /**
     * Load JSON file as an array
     *
     *
     * @throws ValidationException
     */
    protected function json(
        string $name,
        string|int|null $keyOne = null,
        string|int|null $keyTwo = null
    ): array {
        if (! Storage::disk('json')->exists($name.'.json')) {
            throw ValidationException::withMessages([
                'file_not_found' => "File $name not found!"]
            );
        }

        $this->json = json_decode(
            Storage::disk('json')->get($name.'.json'), true
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
    protected function collection(
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
    protected function readFromJson(string $name): array
    {
        $loaded = $this->collection($name)
            ->transform(callback: fn ($loaded) => $this->data($loaded));

        return [
            'name' => $name,
            'count' => $loaded->count(),
            'data' => $loaded->chunk(500),
        ];
    }
}
