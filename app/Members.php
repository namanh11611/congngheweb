<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{

    protected $table = "Members";
    public $timestamps = false;

    public function customer()
    {
        return $this->hasOne('App\Customers', 'customer_id', 'id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'user_id', 'id');
    }
}
