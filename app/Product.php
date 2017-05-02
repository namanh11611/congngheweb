<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'alias', 'description', 'price', 'image', 'quantity', 'cate_id'];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function product_image()
    {
        return $this->hasMany('App\Product_image');
    }
}
