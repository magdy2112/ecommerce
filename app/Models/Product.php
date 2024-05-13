<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
    public function orderdetails(){
        return $this->hasMany(OrderDetail::class,'product_id');
    }

//  public function getNetpriceAttribute()
//  {
//     if($this->discount->status == 'active'){
//         return $this->price - ($this->price * $this->discount->percent / 100);
//     }else{
//             return $this->price;

//         }
protected function Netprice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->discount->status =='active'?$this->price - ($this->price * $this->discount->percent / 100):$this->price,
        );
    }

 }










