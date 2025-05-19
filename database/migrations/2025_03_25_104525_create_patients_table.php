<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id('patient_id');
            $table->string('image_path');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('contact_number');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_number');
            $table->unsignedBigInteger('patient_tier_id');
            $table->string('occupation');
            $table->text('address');
            $table->text('medical_concerns');
            $table->text('current_medications');
            $table->text('note_from_admin');
            $table->timestamps();

        });
    } 

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}