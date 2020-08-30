<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiderCard extends Model {

    protected $table = 'rider_cards';
    protected $fillable = ['rider_id', 'card_number', 'card_holder', 'expiry_month', 'expiry_year', 'cvv'];

}
