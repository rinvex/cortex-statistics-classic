<?php

declare(strict_types=1);

namespace Cortex\Statistics\Providers;

use Illuminate\Support\ServiceProvider;
use Rinvex\Support\Traits\ConsoleTools;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Eloquent\Relations\Relation;

class StatisticsServiceProvider extends ServiceProvider
{
    use ConsoleTools;

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
