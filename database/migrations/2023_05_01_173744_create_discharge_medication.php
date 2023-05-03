<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDischargeMedication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discharge_medication', function (Blueprint $table) {
            $table->id();
            $table->string('medication_name')->nullable();
            $table->foreignId('discharge_detail_id')->constrained('discharge_detail')->onDelete('cascade');
            $table->text('medication_duration')->nullable();
            $table->text('medication_duration_number')->nullable();
            $table->text('medication_dosage')->nullable();
            $table->string('medication_route')->nullable();
            $table->string('medication_frequency')->nullable();
            $table->string('medication_instruction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discharge_medication');
    }
}
