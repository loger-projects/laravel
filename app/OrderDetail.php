<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\User;

class OrderDetail extends Model
{
    protected $fillable = ['order_id', 'product_id', 'count', 'price'];

    public function orders () {
        return $this->belongTo(Order::class);
    }
    
    public function products() {
        return $this->belongTo(Product::class);
    }
}
