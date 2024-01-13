<?php

namespace Martanto\Indonesia\Seeders;

use Martanto\Indonesia\Models\Indonesia\IndonesiaProvince;

class IndonesiaProvinceSeeder extends BaseIndonesiaSeeder
{
    /**
     * The console command description.
     */
    protected string $description = 'Seeding Indonesia Province';

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
        ];
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->handle('provinces', new IndonesiaProvince);
    }
}
