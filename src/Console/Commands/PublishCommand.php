<?php

declare(strict_types=1);

namespace Cortex\Statistics\Console\Commands;

use Rinvex\Statistics\Console\Commands\PublishCommand as BasePublishCommand;

class PublishCommand extends BasePublishCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cortex:publish:statistics {--f|force : Overwrite any existing files.} {--r|resource=* : Specify which resources to publish.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Cortex Statistics Resources.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        parent::handle();

        collect($this->option('resource') ?: ['config', 'lang', 'migrations'])->each(function ($resource) {
            $this->call('vendor:publish', ['--tag' => "cortex/statistics::{$resource}", '--force' => $this->option('force')]);
        });

        $this->line('');
    }
}
