<?php

declare(strict_types=1);

namespace Cortex\Statistics\Console\Commands;

use Rinvex\Statistics\Console\Commands\RollbackCommand as BaseRollbackCommand;

class RollbackCommand extends BaseRollbackCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cortex:rollback:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback Cortex Statistics Tables.';
}
