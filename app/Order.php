<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderDetails;
use App\User;

class Order extends Model
{
    protected $fillable = ['user_id', 'description', 'total'];

    public function orderDetails() {
        return $this->hasMany(OrderDetails::class);
    }
    
    public function users () {
        return $this->belongTo(User::class);
    }
}
