<?php

namespace Martanto\Indonesia\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Indonesia
 *
 * @mixin \Martanto\Indonesia\IndonesiaServiceProvider
 * @package Martanto\Indonesia\Facades
 */
class Indonesia extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Martanto\Indonesia\Indonesia::class;
    }
}
