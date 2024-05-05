<?php

use App\Models\PaymentDetail;
use App\Models\User;
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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
        //    $table->foreignIdFor(User::class)->constrained();
           $table->foreignId('user_id')->constrained();
           $table->float('total',8,2);
           $table->integer('amount');
           $table->enum('provider',['cib','masr','hsbc']);
           $table->enum('status',['success','failed','pending']);
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
        Schema::dropIfExists('order_details');
    }
};