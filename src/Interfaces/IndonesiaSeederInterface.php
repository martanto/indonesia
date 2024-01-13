<?php

namespace Martanto\Indonesia\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface IndonesiaSeederInterface
{
    /**
     * Transform Data
     */
    public function data(array $loaded): array;

    /**
     * Insert data into database
     */
    public function seed(array $json, Model $model): void;
}
