<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory,SoftDeletes,Notifiable;
    protected $fillable = [
        'name',
        'description',
        'price',
        'Product_Category_id',
        'product_inventory_id',
        'discount_id',
    ];
    public function category (){
        return $this->belongsTo(ProductCategory::class,'Product_Category_id');
    }
    public function inventory (){
        return $this->belongsTo(ProductInventory::class,'product_inventory_id');
    }
    public function discount (){
        return $this->belongsTo(discount::class,'discount_id');
    }
    public function users(){
        return $this->belongsToMany(user::class,'favs');
    }
    public function cart(){
        return $this->hasMany(CartItem::class,'product_id');
    }
}
