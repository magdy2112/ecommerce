<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public function products(){

        return $this->hasMany(product::class,'Product_Category_id');
        // foreign key belongs to product model
    }
 
}