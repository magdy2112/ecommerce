<?php

use App\Models\Discount;
use App\Models\ProductCategory;
use App\Models\ProductInventory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');

            // $table->foreignIdFor(ProductCategory::class)->constrained();
            $table->foreignId('Product_Category_id')->constrained();
            $table->foreignId('discount_id')->constrained();
            $table->foreignId('product_inventory_id')->constrained();
            // $table->foreignIdFor(ProductInventory::class)->constrained();


            $table->float('price');
            $table->float('netprice')->default(0);


            // $table->foreignIdFor(Discount::class)->constrained();
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
