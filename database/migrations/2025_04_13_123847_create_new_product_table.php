<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_product', function (Blueprint $table) {
            $table->id();
    
            // Basic product information
            $table->string('sku')->unique();
            $table->string('name');
            $table->string('product_image')->nullable();
            
            // Category relationship
            $table->foreignId('category_id')->constrained('categories', 'category_id');
            $table->foreignId('supplier_id')->constrained('suppliers', 'suppler_id');
            // Pricing
            $table->decimal('base_price', 10, 2);
            // In your migration
             $table->decimal('price', 10, 2)->nullable();
            
            // Stock management  
            $table->integer('quantity')->default(0);
            $table->integer('restock_point')->nullable();
            
            // Dates
            $table->date('manufacturing_date')->nullable();
            $table->date('expiry_date')->nullable(); 
            $table->date('removal_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_product');
    }
}
