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
        Bouncer::allow('admin')->to('list-statistics');
    }
}
