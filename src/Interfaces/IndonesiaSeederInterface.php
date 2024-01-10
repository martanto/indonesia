<?php

namespace Martanto\Indonesia\Interfaces;

interface IndonesiaSeederInterface
{
    /**
     * Transform Data
     *
     * @param array $loaded
     * @return array
     */
    public function data(array $loaded): array;

    /**
     * Insert data into database
     *
     * @param array $json
     * @return void
     */
    public function seed(array $json): void;

    /**
     * Run seeder
     *
     * @return void
     */
    public function run(): void;
}
