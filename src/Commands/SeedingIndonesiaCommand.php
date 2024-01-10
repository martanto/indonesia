<?php

namespace Martanto\Indonesia\Commands;

use Illuminate\Console\Command;

class SeedingIndonesiaCommand extends Command
{
    public $signature = 'indonesia:seeding';

    public $description = 'Seeding Indonesia Administrative';

    public function handle(): int
    {
        $this->call(
            command : 'db:seed',
            arguments : [
                '--class' => 'Martanto\Indonesia\Database\Seeders\DatabaseSeeder',
                '--force' => true,
            ]
        );

        return self::SUCCESS;
    }
}
