<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\UserHobby;
use App\UserFriend;
use App\UserBlock;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hobbies() {
        return $this->belongsToMany(UserHobby::class, 'user_hobbies');
    }

    public function following() {
        return $this->belongsToMany(User::class, 'user_friends', 'user_id', 'user_following_id');
    }

    public function blocked() {
        return $this->belongsToMany(User::class, 'user_blocks', 'user_id', 'block_user_id');
    }

}
