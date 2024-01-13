<?php

namespace Martanto\Indonesia\Seeders;

use Martanto\Indonesia\Models\Indonesia\IndonesiaDistrict;

class IndonesiaDistrictSeeder extends BaseIndonesiaSeeder
{
    /**
     * The console command description.
     */
    protected string $description = 'Seeding Indonesia District';

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
            'code_city' => $loaded['code_cities'],
        ];
    }

    /**
     * Run seeder
     */
    public function run(): void
    {
        $this->handle('districts', new IndonesiaDistrict);
    }
}
