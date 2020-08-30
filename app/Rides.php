<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rider;
use App\Driver;

class Rides extends Model {

    protected $table = 'rides';
    protected $fillable = ['rider_id', 'driver_id', 'source_lat',
        'source_long', 'source_address', 'destination_lat', 'destination_long', 'destination_address'];

    public function driver() {
        return $this->belongsToMany(Driver::class, 'rides', 'id', 'driver_id');
    }

    public function rider() {
        return $this->belongsToMany(Rider::class, 'rides', 'id', 'rider_id');
    }

}
