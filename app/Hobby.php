<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model {

    protected $fillable = ['name', 'is_active'];
 
     public function users()
    {
        return $this->belongsToMany(User::class, 'user_hobbies');
    }
}
