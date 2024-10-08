<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentFollowupsTable extends Migration
{
    public function up()
    {
        Schema::create('incident_followups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incident_id'); // Foreign key for the incident
            $table->enum('action_type', ['repair', 'insurance_claim', 'driver_disciplinary']);
            $table->text('description')->nullable(); // Description of action taken
            $table->date('action_date'); // Date of the follow-up action
            $table->timestamps();

            $table->foreign('incident_id')->references('id')->on('incidents')->onDelete('cascade'); // Define foreign key constraint
        });
    }

    public function down()
    {
        Schema::dropIfExists('incident_followups');
    }
}
