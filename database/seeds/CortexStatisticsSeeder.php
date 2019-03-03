<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class CortexStatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abilities = [
            ['name' => 'list-statistics', 'title' => 'List statistics'],
        ];

        collect($abilities)->each(function (array $ability) {
            app('cortex.auth.ability')->create($ability);
        });
    }
}
