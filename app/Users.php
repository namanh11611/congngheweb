<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\CanResetPassword;

class Users extends Model
{
    protected $table = "Users";
    public $timestamps = false;
}
