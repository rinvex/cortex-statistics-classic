<?php

declare(strict_types=1);

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;

// Adminarea breadcrumbs
Breadcrumbs::register('adminarea.statistics.index', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->push('<i class="fa fa-dashboard"></i> '.trans('cortex/foundation::common.adminarea'), route('adminarea.home'));
    $breadcrumbs->push(trans('cortex/statistics::common.statistics'), route('adminarea.statistics.index'));
});

Breadcrumbs::register('adminarea.statistics.agents', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.agents'), route('adminarea.statistics.agents'));
});

Breadcrumbs::register('adminarea.statistics.devices', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.devices'), route('adminarea.statistics.devices'));
});

Breadcrumbs::register('adminarea.statistics.geoips', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.geoips'), route('adminarea.statistics.geoips'));
});

Breadcrumbs::register('adminarea.statistics.paths', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.paths'), route('adminarea.statistics.paths'));
});

Breadcrumbs::register('adminarea.statistics.platforms', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.platforms'), route('adminarea.statistics.platforms'));
});

Breadcrumbs::register('adminarea.statistics.requests', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.requests'), route('adminarea.statistics.requests'));
});

Breadcrumbs::register('adminarea.statistics.routes', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('adminarea.statistics.index');
    $breadcrumbs->push(trans('cortex/statistics::common.routes'), route('adminarea.statistics.routes'));
});
