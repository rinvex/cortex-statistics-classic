<?php

declare(strict_types=1);

use Rinvex\Menus\Models\MenuItem;
use Rinvex\Menus\Models\MenuGenerator;

Menu::register('adminarea.sidebar', function (MenuGenerator $menu) {
    $menu->dropdown(function (MenuItem $dropdown) {
        $dropdown->route(['adminarea.statistics.index'], trans('cortex/statistics::common.charts'), 10, 'fa fa-pie-chart')->ifCan('list-statistics');
        $dropdown->route(['adminarea.statistics.requests'], trans('cortex/statistics::common.requests'), 10, 'fa fa-exchange')->ifCan('requests-statistics');
        $dropdown->route(['adminarea.statistics.platforms'], trans('cortex/statistics::common.platforms'), 20, 'fa fa-windows')->ifCan('platforms-statistics');
        $dropdown->route(['adminarea.statistics.devices'], trans('cortex/statistics::common.devices'), 30, 'fa fa-laptop')->ifCan('devices-statistics');
        $dropdown->route(['adminarea.statistics.geoips'], trans('cortex/statistics::common.geoips'), 40, 'fa fa-flag')->ifCan('geoips-statistics');
        $dropdown->route(['adminarea.statistics.agents'], trans('cortex/statistics::common.agents'), 50, 'fa fa-chrome')->ifCan('agents-statistics');
        $dropdown->route(['adminarea.statistics.routes'], trans('cortex/statistics::common.routes'), 60, 'fa fa-unlink')->ifCan('routes-statistics');
        $dropdown->route(['adminarea.statistics.paths'], trans('cortex/statistics::common.paths'), 70, 'fa fa-link')->ifCan('paths-statistics');
    }, trans('cortex/statistics::common.statistics'), 60, 'fa fa-bar-chart');
});
