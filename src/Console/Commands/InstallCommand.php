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
    protected $signature = 'cortex:install:statistics {--f|force : Force the operation to run when in production.} {--r|resource=* : Specify which resources to publish.} {--r|resource=* : Specify which resources to publish.}';

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
        $this->alert($this->description);

        $this->call('cortex:publish:statistics', ['--force' => $this->option('force'), '--resource' => $this->option('resource')]);
        $this->call('cortex:migrate:statistics', ['--force' => $this->option('force')]);
        $this->call('cortex:seed:statistics');

        $this->call('cortex:activate', ['--module' => 'cortex/statistics']);
    }
}
