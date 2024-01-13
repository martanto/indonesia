<?php

namespace Martanto\Indonesia\Seeders;

use Martanto\Indonesia\Models\Indonesia\IndonesiaCity;

class IndonesiaCitySeeder extends BaseIndonesiaSeeder
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
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->handle('cities', new IndonesiaCity);
    }
}
