<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('bar_code')->primary();
            $table->string('name');
            $table->string('sku')->unique();
            $table->text('description')->nullable();        
            // Media
            $table->string('product_image')->nullable();
            // Inventory
            $table->integer('quantity')->default(0);
            $table->integer('quantity_in_transit')->default(0);
            $table->timestamp('last_restocked_at')->nullable();
            $table->integer('total_stock_lifetime')->default(0);  
            // Shipping
            $table->enum('shipping_type', ['seller', 'company'])->default('company');     
            // Attributes
            $table->boolean('is_fragile')->default(false);
            $table->boolean('is_biodegradable')->default(false);
            $table->boolean('is_frozen')->default(false);
            $table->decimal('max_temperature', 5, 2)->nullable();
            $table->date('expiry_date')->nullable();
            
            // Pricing
            $table->decimal('base_price', 10, 2);
            $table->decimal('discounted_price', 10, 2)->nullable();
            $table->boolean('in_stock')->default(true);
            // Organization
            $table->foreignId('category_id')->constrained('categories', 'category_id');
            $table->enum('status', ['Published', 'Scheduled', 'Inactive'])->default('Published');
            $table->text('tags')->nullable();
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
        Schema::dropIfExists('products');
    }
}
