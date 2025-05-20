
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('service_products', function (Blueprint $table) {
        $table->id();
        $table->string('service_name');
        $table->date('date');
        $table->string('branch_name');
        $table->string('service_category');
        $table->decimal('service_cost', 10, 2); // adjust precision if needed
        $table->string('type');
        $table->timestamps(); // created_at & updated_at
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_products');
    }
}
