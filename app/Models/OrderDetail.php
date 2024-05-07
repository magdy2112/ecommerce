<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'amount',
        'total',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(product::class, 'order_detail_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
