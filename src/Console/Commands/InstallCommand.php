<?php

declare(strict_types=1);

namespace Cortex\Statistics\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cortex:install:statistics {--force : Force the operation to run when in production.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Cortex Statistics Module.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->warn($this->description);

        $this->call('cortex:migrate:statistics', ['--force' => $this->option('force')]);
        $this->call('cortex:publish:statistics', ['--force' => $this->option('force')]);
        $this->call('cortex:seed:statistics');
    }
}
