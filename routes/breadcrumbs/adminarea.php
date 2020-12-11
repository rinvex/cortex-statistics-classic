<?php

declare(strict_types=1);

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;

Breadcrumbs::register('adminarea.cortex.statistics.statistics.index', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->push('<i class="fa fa-dashboard"></i> '.config('app.name'), route('adminarea.home'));
    $breadcrumbs->push(trans('cortex/statistics::common.statistics'), route('adminarea.cortex.statistics.statistics.index'));
});

Breadcrumbs::register('adminarea.cortex.statistics.statistics.agents', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.cortex.statistics.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.agents'), route('adminarea.cortex.statistics.statistics.agents'));
});

Breadcrumbs::register('adminarea.cortex.statistics.statistics.devices', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.cortex.statistics.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.devices'), route('adminarea.cortex.statistics.statistics.devices'));
});

Breadcrumbs::register('adminarea.cortex.statistics.statistics.geoips', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.cortex.statistics.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.geoips'), route('adminarea.cortex.statistics.statistics.geoips'));
});

Breadcrumbs::register('adminarea.cortex.statistics.statistics.paths', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.cortex.statistics.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.paths'), route('adminarea.cortex.statistics.statistics.paths'));
});

Breadcrumbs::register('adminarea.cortex.statistics.statistics.platforms', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.cortex.statistics.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.platforms'), route('adminarea.cortex.statistics.statistics.platforms'));
});

Breadcrumbs::register('adminarea.cortex.statistics.statistics.requests', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.cortex.statistics.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.requests'), route('adminarea.cortex.statistics.statistics.requests'));
});

Breadcrumbs::register('adminarea.cortex.statistics.statistics.routes', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.cortex.statistics.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.routes'), route('adminarea.cortex.statistics.statistics.routes'));
});
