<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->Increments('id');
            
            $table->string('description');

            //fk doctors
            $table->unsignedInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('users');

            //fk specialty
            $table->unsignedInteger('specialty_id');
            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
            //fk patients
            $table->unsignedInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');


            $table->date('schedule_date');
            $table->time('schedule_time');

            $table->string('type');

            //reservado, confirmada , atendidad, cancelada

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
