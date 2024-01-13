<?php

namespace Martanto\Indonesia\Seeders;

use Martanto\Indonesia\Models\Indonesia\IndonesiaVillage;

class IndonesiaVillageSeeder extends BaseIndonesiaSeeder
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
            'postal_code' => $loaded['postal_code'],
            'code_district' => $loaded['code_districts'],
        ];
    }

    /**
     * Run seeder
     */
    public function run(): void
    {
        $this->handle('villages', new IndonesiaVillage);
    }
}
