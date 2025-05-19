<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePatientsNullableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->string('emergency_contact_name')->nullable()->change();
            $table->string('emergency_contact_number')->nullable()->change();
            $table->text('medical_concerns')->nullable()->change();
            $table->text('current_medications')->nullable()->change();
            $table->text('note_from_admin')->nullable()->change();
            $table->string('image_path')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->string('emergency_contact_name')->nullable(false)->change();
            $table->string('emergency_contact_number')->nullable(false)->change();
            $table->text('medical_concerns')->nullable(false)->change();
            $table->text('current_medications')->nullable(false)->change();
            $table->text('note_from_admin')->nullable(false)->change();
            $table->string('image_path')->nullable(false)->change();
        });
    }
}
