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
         User::factory(20)->create();
         ProductCategory::factory(10)->create();
         ProductInventory::factory(20)->create();
         Discount::factory(3)->create();
        Product::factory(10)->create();
        CartItem::factory(15)->create();
        OrderDetail::factory(15)->create();
       
        UserAddress::factory(20)->create();
        UserPayment::factory(20)->create();






    }
}
