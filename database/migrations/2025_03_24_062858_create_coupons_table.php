<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->string('coupon_code');  
            $table->string('discount_name');
            $table->text('description');
            $table->string('discount_type');
            $table->bigInteger('discount_value');
            $table->bigInteger('service_id'); // Nullable to allow for no service selection
            $table->string('start_end_date');
            $table->string('new_customer');
            $table->string('branch_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
