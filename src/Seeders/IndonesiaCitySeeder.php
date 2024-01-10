<?php

namespace Martanto\Indonesia\Seeders;

use Martanto\Indonesia\Models\Indonesia\IndonesiaCity;

class IndonesiaCitySeeder extends IndonesiaSeeder
{
    /**
     * The console command description.
     */
    protected string $description = 'Seeding Indonesia City';

    /**
     * Transform Data
     */
    public function data(array $loaded): array
    {
        return [
            'code' => $loaded['code'],
            'name' => $loaded['name'],
            'latitude' => $loaded['latitude'],
            'longitude' => $loaded['longitude'],
            'code_province' => $loaded['code_province'],
        ];
    }

    /**
     * Insert data into database
     */
    public function seed(array $json): void
    {
        $bar = $this->command->getOutput()->createProgressBar($json['count']);
        $bar->start();
        $json['data']->each(function ($chunked) use ($bar) {
            IndonesiaCity::insert($chunked->toArray());
            $bar->advance(count($chunked));
        });
        $bar->finish();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info(PHP_EOL.$this->description);

        collect([
            'cities',
        ])->map(function ($name) {
            return $this->readFromJson($name);
        })->each(function ($json) {
            $this->command->info('Update data '.$json['name']);
            $this->seed($json);
            $this->command->info(' Update data '.$json['name'].' berhasil');
        });
    }
}
