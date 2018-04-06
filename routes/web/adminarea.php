<?php

declare(strict_types=1);

Route::domain(domain())->group(function () {

    Route::name('adminarea.')
         ->namespace('Cortex\Statistics\Http\Controllers\Adminarea')
         ->middleware(['web', 'nohttpcache', 'can:access-adminarea'])
         ->prefix(config('cortex.foundation.route.locale_prefix') ? '{locale}/'.config('cortex.foundation.route.prefix.adminarea') : config('cortex.foundation.route.prefix.adminarea'))->group(function () {

        // Statistics Routes
        Route::name('statistics.')->prefix('statistics')->group(function () {
            Route::get('/')->name('index')->uses('StatisticsController@index');
            Route::get('paths')->name('paths')->uses('StatisticsController@paths');
            Route::get('agents')->name('agents')->uses('StatisticsController@agents');
            Route::get('geoips')->name('geoips')->uses('StatisticsController@geoips');
            Route::get('devices')->name('devices')->uses('StatisticsController@devices');
            Route::get('requests')->name('requests')->uses('StatisticsController@requests');
            Route::get('platforms')->name('platforms')->uses('StatisticsController@platforms');
            Route::get('routes')->name('routes')->uses('StatisticsController@routes');
        });

    });

});
