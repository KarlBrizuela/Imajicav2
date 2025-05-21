<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('void_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained();
            $table->foreignId('service_id')->constrained();
            $table->foreignId('patient_id')->constrained();
            $table->foreignId('staff_id')->constrained();
            $table->decimal('service_cost', 10, 2);
            $table->string('status')->default('Cancelled');
            $table->dateTime('start_date');
            $table->foreignId('branch_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('void_logs');
    }
};