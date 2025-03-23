<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaveUserPassword extends Model
{
    //fillable
    protected $fillable = ['user_id', 'password'];
}
