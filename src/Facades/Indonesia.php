<?php

namespace Martanto\Indonesia\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Martanto\Indonesia\Indonesia
 */
class Indonesia extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Martanto\Indonesia\Indonesia::class;
    }
}
