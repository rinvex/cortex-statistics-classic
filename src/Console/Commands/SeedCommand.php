<?php

declare(strict_types=1);

namespace Cortex\Statistics\Console\Commands;

use Illuminate\Console\Command;

class SeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cortex:seed:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Cortex Statistics Data.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->warn($this->description);

        $this->call('db:seed', ['--class' => 'CortexStatisticsSeeder']);
    }
}
