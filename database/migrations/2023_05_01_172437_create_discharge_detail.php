<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDischargeDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discharge_detail', function (Blueprint $table) {
            $table->id();
            $table->string('discharge_patient_name')->nullable();
            $table->date('discharge_admission_date')->nullable();
            $table->date('discharge_discharge_date')->nullable();
            $table->json('prescription_corbidity')->nullable();
            $table->string('prescription_other')->nullable();
            $table->string('prescription_final_diagnosis')->nullable();
            $table->string('prescription_presenting_complaint')->nullable();
            $table->string('prescription_notes_of_hospital_stay')->nullable();
            $table->string('prescription_significant_labs')->nullable();
            $table->string('prescription_significant_past_history')->nullable();
            $table->json('prescription_follow_up_instructions')->nullable();
            $table->string('prescription_second_other')->nullable();
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
        Schema::dropIfExists('discharge_detail');
    }
}
