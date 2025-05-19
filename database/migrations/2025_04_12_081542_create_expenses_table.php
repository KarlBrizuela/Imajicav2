<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id('expense_id');
            $table->string('expense_name');
            $table->bigInteger('category_expense_id');
            $table->string('date_expense');
            $table->string('payment_status');
            $table->string('invoice_number')->nullable();
            $table->string('remarks');
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
        Schema::dropIfExists('expenses');
    }
}
