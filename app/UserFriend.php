<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFriend extends Model
{
    protected $fillable=['user_id','user_following_id'];
}
