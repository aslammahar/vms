<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('driver_id');
            $table->dateTime('incident_date');
            $table->string('location');
            $table->text('description');
            $table->enum('severity', ['Minor', 'Moderate', 'Severe']);
            $table->text('injuries')->nullable();
            $table->text('damage')->nullable();
            $table->text('witnesses')->nullable();
            $table->string('police_report')->nullable();
            $table->string('insurance_details')->nullable();
            $table->enum('status', ['Open', 'Under Review', 'Closed'])->default('Open');
            $table->json('photos')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}
