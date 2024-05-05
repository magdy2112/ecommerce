<?php

use App\Models\OrderDetail;
use App\Models\Product;
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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_detail_id')->constrained();
            // $table->foreignIdFor(Product::class)->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity');
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
        Schema::dropIfExists('order_items');
    }
};
