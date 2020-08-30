<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiderHobby extends Model {

    protected $table='rider_hobbies';
    protected $fillable = ['rider_id', 'hobby_id'];
 
     
}
