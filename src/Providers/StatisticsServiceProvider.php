<?php

declare(strict_types=1);

namespace Cortex\Statistics\Providers;

use Illuminate\Support\ServiceProvider;
use Rinvex\Support\Traits\ConsoleTools;
use Illuminate\Contracts\Events\Dispatcher;
use Cortex\Statistics\Console\Commands\SeedCommand;
use Illuminate\Database\Eloquent\Relations\Relation;
use Cortex\Statistics\Console\Commands\UnloadCommand;
use Cortex\Statistics\Console\Commands\InstallCommand;
use Cortex\Statistics\Console\Commands\MigrateCommand;
use Cortex\Statistics\Console\Commands\PublishCommand;
use Cortex\Statistics\Console\Commands\RollbackCommand;
use Cortex\Statistics\Console\Commands\ActivateCommand;
use Cortex\Statistics\Console\Commands\AutoloadCommand;
use Cortex\Statistics\Console\Commands\DeactivateCommand;

class StatisticsServiceProvider extends ServiceProvider
{
    use ConsoleTools;

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
        ActivateCommand::class => 'command.cortex.statistics.activate',
        DeactivateCommand::class => 'command.cortex.statistics.deactivate',
        AutoloadCommand::class => 'command.cortex.statistics.autoload',
        UnloadCommand::class => 'command.cortex.statistics.unload',

        SeedCommand::class => 'command.cortex.statistics.seed',
        InstallCommand::class => 'command.cortex.statistics.install',
        MigrateCommand::class => 'command.cortex.statistics.migrate',
        PublishCommand::class => 'command.cortex.statistics.publish',
        RollbackCommand::class => 'command.cortex.statistics.rollback',
    ];

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register(): void
    {
        // Register console commands
        $this->registerCommands($this->commands);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $dispatcher): void
    {
        // Map relations
        Relation::morphMap([
            'path' => config('rinvex.statistics.models.path'),
            'agent' => config('rinvex.statistics.models.agent'),
            'geoip' => config('rinvex.statistics.models.geoip'),
            'route' => config('rinvex.statistics.models.route'),
            'device' => config('rinvex.statistics.models.device'),
            'request' => config('rinvex.statistics.models.request'),
            'platform' => config('rinvex.statistics.models.platform'),
        ]);
    }
}
