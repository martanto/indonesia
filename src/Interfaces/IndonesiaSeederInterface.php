<?php

namespace Martanto\Indonesia\Interfaces;

interface IndonesiaSeederInterface
{
    /**
     * Transform Data
     */
    public function data(array $loaded): array;

    /**
     * Insert data into database
     */
    public function seed(array $json): void;

    /**
     * Run seeder
     */
    public function run(): void;
}
