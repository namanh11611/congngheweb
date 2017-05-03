<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
    protected $fillable = ['name','alias','order','parent_id','description'];

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
