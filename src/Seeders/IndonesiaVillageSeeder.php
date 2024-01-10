<?php

namespace Martanto\Indonesia\Seeders;

use Martanto\Indonesia\Models\Indonesia\IndonesiaVillage;

class IndonesiaVillageSeeder extends IndonesiaSeeder
{
    /**
     * The console command description.
     */
    protected string $description = 'Seeding Indonesia Village';

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
            'code_district' => $loaded['code_districts'],
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
            IndonesiaVillage::insert($chunked->toArray());
            $bar->advance(count($chunked));
        });
        $bar->finish();
    }

    /**
     * Run seeder
     */
    public function run(): void
    {
        $this->command->info(PHP_EOL.$this->description);

        collect([
            'villages',
        ])->map(function ($name) {
            return $this->readFromJson($name);
        })->each(function ($json) {
            $this->command->info('Update data '.$json['name']);
            $this->seed($json);
            $this->command->info(' Update data '.$json['name'].' berhasil');
        });
    }
}
