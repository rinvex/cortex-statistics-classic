<?php

declare(strict_types=1);

namespace Cortex\Statistics\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Cortex\Statistics\Console\Commands\SeedCommand;
use Illuminate\Database\Eloquent\Relations\Relation;
use Cortex\Statistics\Console\Commands\InstallCommand;
use Cortex\Statistics\Console\Commands\MigrateCommand;
use Cortex\Statistics\Console\Commands\PublishCommand;
use Cortex\Statistics\Console\Commands\RollbackCommand;

class StatisticsServiceProvider extends ServiceProvider
{
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
        // Register console commands
        ! $this->app->runningInConsole() || $this->registerCommands();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Router $router): void
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
        require __DIR__.'/../../routes/breadcrumbs.php';
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'cortex/statistics');
        ! $this->app->runningInConsole() || $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->app->runningInConsole() || $this->app->afterResolving('blade.compiler', function () {
            require __DIR__.'/../../routes/menus.php';
        });

        // Publish Resources
        ! $this->app->runningInConsole() || $this->publishResources();
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    protected function publishResources(): void
    {
        $this->publishes([realpath(__DIR__.'/../../database/migrations') => database_path('migrations')], 'cortex-statistics-migrations');
        $this->publishes([realpath(__DIR__.'/../../resources/lang') => resource_path('lang/vendor/cortex/statistics')], 'cortex-statistics-lang');
    }

    /**
     * Register console commands.
     *
     * @return void
     */
    protected function registerCommands(): void
    {
        // Register artisan commands
        foreach ($this->commands as $key => $value) {
            $this->app->singleton($value, $key);
        }

        $this->commands(array_values($this->commands));
    }
}
