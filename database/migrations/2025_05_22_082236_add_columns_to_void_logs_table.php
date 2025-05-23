<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToVoidLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('void_logs', function (Blueprint $table) {
        $table->string('customer_name')->after('booking_id');
        $table->string('customer_email')->after('customer_name');
        $table->string('payment_method')->after('customer_email');
        $table->dateTime('order_date')->after('payment_method');
        $table->renameColumn('start_date', 'void_date'); // Optional: Rename for clarity
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('void_logs', function (Blueprint $table) {
            //
        });
    }
}
