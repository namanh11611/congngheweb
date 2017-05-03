<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_output extends Model
{
    protected $table = 'orders_output';
    protected $fillable = ['status', 'order_address', 'customer_id'];

    public function order_out_product()
    {
        return $this->hasMany('App\Order_out_product');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customers');
    }
}
