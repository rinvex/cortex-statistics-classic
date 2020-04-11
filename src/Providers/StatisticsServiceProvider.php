<?php

declare(strict_types=1);

namespace Cortex\Statistics\Providers;

use Illuminate\Support\ServiceProvider;
use Rinvex\Support\Traits\ConsoleTools;
use Illuminate\Contracts\Events\Dispatcher;
use Cortex\Statistics\Console\Commands\SeedCommand;
use Illuminate\Database\Eloquent\Relations\Relation;
use Cortex\Statistics\Console\Commands\InstallCommand;
use Cortex\Statistics\Console\Commands\MigrateCommand;
use Cortex\Statistics\Console\Commands\PublishCommand;
use Cortex\Statistics\Console\Commands\RollbackCommand;

class StatisticsServiceProvider extends ServiceProvider
{
    use ConsoleTools;

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
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
        // Merge config
        $this->mergeConfigFrom(realpath(__DIR__.'/../../config/config.php'), 'cortex.statistics');

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

        // Load resources
        $this->loadRoutesFrom(__DIR__.'/../../routes/web/adminarea.php');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'cortex/statistics');
        ! $this->autoloadMigrations('cortex/statistics') || $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        $this->app->runningInConsole() || $dispatcher->listen('accessarea.ready', function ($accessarea) {
            ! file_exists($menus = __DIR__."/../../routes/menus/{$accessarea}.php") || require $menus;
            ! file_exists($breadcrumbs = __DIR__."/../../routes/breadcrumbs/{$accessarea}.php") || require $breadcrumbs;
        });

        // Publish Resources
        $this->publishesLang('cortex/statistics', true);
        $this->publishesMigrations('cortex/statistics', true);
    }
}
