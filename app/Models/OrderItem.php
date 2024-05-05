<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function orderdetails(){
        return $this->belongsTo(OrderDetail::class,'order_detail_id');
    }
}
