<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {

            $table->id('service_id');
            $table->string('service_name');
            $table->string('service_image');
            $table->string('branch_code');
            $table->text('description');
            $table->bigInteger('duration');
            $table->string('service_category');
            $table->bigInteger('service_cost');
            $table->bigInteger('loyalty_pts');
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
        Schema::dropIfExists('services');
    }
}
