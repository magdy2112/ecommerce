<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\ProductCategory;
use App\Models\ProductInventory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array

    {

        return [


         'name'=>fake()->name(),
          'description'=>fake()->paragraph(3),
          'Product_Category_id'=>ProductCategory::all()->random()->id,
          'product_inventory_id'=>ProductInventory::all()->random()->id,

          'discount_id'=>Discount::all()->random()->id,


        //   'product_category_id'=>ProductCategory::all()->random()->id,
        //   'product_inventory_id'=>ProductInventory::all()->random()->id,
          'price'=>fake()->numberBetween(100,10000),




        ];
    }
}
