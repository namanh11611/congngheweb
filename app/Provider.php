<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';
    protected $fillable = ['name_provider', 'address'];
    public $timestamps = false;

    public function order_input()
    {
        return $this->hasMany('App\Order_input');
    }
}
