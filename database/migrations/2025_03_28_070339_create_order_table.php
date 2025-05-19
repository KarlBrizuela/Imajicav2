<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('order_number')->unique();
            $table->datetime('order_date');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_avatar')->nullable();
            $table->enum('payment_status', ['Paid', 'Pending', 'Failed', 'Cancelled']);
            $table->enum('order_status', ['Ordered', 'Delivered', 'Out for Delivery', 'Ready to Pickup']);
            $table->string('payment_method');
            $table->string('payment_method_details')->nullable();
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
        Schema::dropIfExists('order');
    }
}
