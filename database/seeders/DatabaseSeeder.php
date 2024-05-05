<?php

namespace Database\Seeders;

use App\Models\CartItem;
use App\Models\Discount;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductInventory;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserPayment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(200)->create();
         ProductCategory::factory(10)->create();
         ProductInventory::factory(100)->create();
         Discount::factory(3)->create();
        Product::factory(400)->create();
        CartItem::factory(100)->create();
        OrderDetail::factory(100)->create();
        OrderItem::factory(100)->create();
        UserAddress::factory(100)->create();
        UserPayment::factory(100)->create();






    }
}
