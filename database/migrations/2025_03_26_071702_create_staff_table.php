<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('contact_number');
            $table->bigInteger('position_id');  // Changed from date to string
            $table->string('department_code');
            $table->date('join_date');
            $table->string('employment_type');
            $table->string('branch_code');
            $table->text('address');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_number');
            $table->timestamps();  // Added timestamps

         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
