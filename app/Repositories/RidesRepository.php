<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class RidesRepository extends BaseRepository {

    protected $rides;

    public function __construct($model) {
        $this->rides = $model;
    }

    public function getRidesByRiderId($rider_id) {

        $query = $this->rides->with('driver')->where(['rider_id' => $rider_id, 'status' => 'accepted'])->get();
        return $query;
    }

    public function getNearByRides() {
        $latitude = Auth::guard('drivers')->user()->lat;
        $longitude = Auth::guard('drivers')->user()->lng;
        $radius_max = config('constants.radius.max');
//        \DB::enableQueryLog();
        $query = $this->rides->select(\DB::raw('*, '
                                        . '(round( 6367 * acos( cos( radians(' . $latitude . ') ) * '
                                        . 'cos( radians( source_lat ) ) * cos( radians( source_long ) - '
                                        . 'radians(' . $longitude . ') ) + sin( radians(' . $latitude . ') ) *'
                                        . ' sin( radians( source_lat ) )'
                                        . ')*1000 ) ) AS distance_in_mtr'))
                        ->having('distance_in_mtr', '<', $radius_max)
                        ->orderBy('distance_in_mtr')
                        ->where(['status' => 'pending'])->get();
//        dd(\DB::getQueryLog());
        return $query;
    }

}
