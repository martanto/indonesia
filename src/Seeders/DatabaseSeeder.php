<?php

namespace Martanto\Indonesia\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Martanto\Indonesia\Models\Indonesia\IndonesiaCity;
use Martanto\Indonesia\Models\Indonesia\IndonesiaDistrict;
use Martanto\Indonesia\Models\Indonesia\IndonesiaProvince;
use Martanto\Indonesia\Models\Indonesia\IndonesiaVillage;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->reset();

        $this->call([
            IndonesiaProvinceSeeder::class,
            IndonesiaCitySeeder::class,
            IndonesiaDistrictSeeder::class,
            IndonesiaVillageSeeder::class,
        ]);
    }

    public function reset(): void
    {
        Schema::disableForeignKeyConstraints();

        IndonesiaProvince::truncate();
        IndonesiaCity::truncate();
        IndonesiaDistrict::truncate();
        IndonesiaVillage::truncate();

        Schema::enableForeignKeyConstraints();
    }
}
