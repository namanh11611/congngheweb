<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_input extends Model
{
    protected $table = 'order_input';
    protected $fillable = ['bill_code', 'provider_id'];

    public function order_in_product()
    {
        return $this->hasMany('App\Order_in_product');
    }

    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }
}
