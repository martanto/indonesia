<?php

namespace Martanto\Indonesia\Commands;

use Illuminate\Console\Command;

class IndonesiaCommand extends Command
{
    public $signature = 'indonesia';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
