<?php

declare(strict_types=1);

namespace Cortex\Statistics\Console\Commands;

use Rinvex\Statistics\Console\Commands\MigrateCommand as BaseMigrateCommand;

class MigrateCommand extends BaseMigrateCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cortex:migrate:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Cortex Statistics Tables.';
}
