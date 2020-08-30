<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Driver extends Authenticatable {

    protected $table='drivers';
    protected $fillable = [
        'name', 'email', 'password'];

}
