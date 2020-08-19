<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBlock extends Model
{
    protected $fillable=['user_id','block_user_id'];
}
