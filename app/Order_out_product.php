<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_out_product extends Model
{
    protected $table = 'order_out_products';
    protected $fillable = ['price_out', 'quantity', 'orderout_id', 'product_id'];
    public $timestamps = false;

    public function order_output()
    {
        return $this->belongsTo('App\Order_output');
    }
}
