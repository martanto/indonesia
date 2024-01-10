<?php

namespace Martanto\Indonesia\Database\Seeders;

use Martanto\Indonesia\Models\Indonesia\IndonesiaProvince;

class IndonesiaProvinceSeeder extends IndonesiaSeeder
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected string $description = 'Seeding Indonesia Province';

    /**
     * @param array $loaded
     * @return array
     */
    public function data(array $loaded): array
    {
        return [
            'code' => $loaded['code'],
            'name' => $loaded['name'],
            'latitude' => $loaded['latitude'],
            'longitude' => $loaded['longitude'],
        ];
    }

    /**
     * @param array $json
     * @return void
     */
    public function seed(array $json): void
    {
        $bar = $this->command->output->createProgressBar($json['count']);
        $bar->start();
        $json['data']->each(function ($chunked) use ($json, $bar) {
            IndonesiaProvince::insert($chunked->toArray());
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
            'provinces'
        ])->map(function ($name) {
            return $this->readFromJson($name);
        })->each(function ($json) {
            $this->command->info('Update data ' . $json['name']);
            $this->seed($json);
            $this->command->info(' Update data ' . $json['name'] . ' berhasil');
        });
    }
}
