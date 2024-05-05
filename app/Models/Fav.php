<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Fav extends Model
{
    use HasFactory ,SoftDeletes,Notifiable;
    protected $fillable = [
        'user_id',
        'product_id',

    ];
    public function product(){
        return $this->belongsTo(product::class,'product_id')->withDefault(['name'=>'Deleted']);
    }
    public function user(){
        return $this->belongsTo(user::class,'user_id')->withDefault(['name'=>'Deleted']);
    }
}
