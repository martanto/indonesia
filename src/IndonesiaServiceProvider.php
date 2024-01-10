<?php

namespace Martanto\Indonesia;

use Martanto\Indonesia\Commands\SeedingIndonesiaCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class IndonesiaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('indonesia')
            ->hasConfigFile('indonesia')
            ->hasMigrations([
                'create_indonesia_provinces_table',
                'create_indonesia_cities_table',
                'create_indonesia_districts_table',
                'create_indonesia_villages_table',
            ])
            ->hasCommand(SeedingIndonesiaCommand::class);
    }
}
