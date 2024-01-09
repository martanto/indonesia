<?php

namespace Martanto\Indonesia;

use Martanto\Indonesia\Commands\IndonesiaCommand;
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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_indonesia_table')
            ->hasCommand(IndonesiaCommand::class);
    }
}
