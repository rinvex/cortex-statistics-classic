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
    protected $signature = 'cortex:publish:statistics {--force : Overwrite any existing files.}';

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
    public function handle()
    {
        parent::handle();

        $this->call('vendor:publish', ['--tag' => 'cortex-statistics-lang', '--force' => $this->option('force')]);
        $this->call('vendor:publish', ['--tag' => 'cortex-statistics-migrations', '--force' => $this->option('force')]);
    }
}
