<?php

use App\Models\Product;
use App\Models\ShoppingSession;
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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();

            // $table->foreignIdFor(Product::class)->constrained();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('user_id')->constrained();


            $table->integer('quantity')->default(1);
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
        Schema::dropIfExists('cart_items');
    }
};
