<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterStatisticsPathsTableAddAccessAreaColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table(config('rinvex.statistics.tables.paths'), function (Blueprint $table) {
            $table->string('accessarea')->nullable()->after('locale');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table(config('rinvex.statistics.tables.paths'), function (Blueprint $table) {
            $table->dropColumn('accessarea');
        });
    }
}
