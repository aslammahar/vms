<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTripMetricsToTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->float('distance_covered')->nullable();
            $table->float('fuel_consumption')->nullable();
            $table->string('performance_metrics')->nullable();
        });
    }

    public function down()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropColumn(['distance_covered', 'fuel_consumption', 'performance_metrics']);
        });
    }

}
