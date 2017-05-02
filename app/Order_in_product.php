<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_in_product extends Model
{
    protected $table = 'order_in_products';
    protected $fillable = ['price_in', 'quantity', 'orderin_id', 'product_id'];
    public $timestamps = false;

    public function order_input()
    {
        return $this->belongsTo('App\Order_input');
    }
}
