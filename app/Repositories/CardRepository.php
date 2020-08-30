<?php

namespace App\Repositories;


Use App\Card;

class CardRepository extends BaseRepository {

    protected $card;
    

    public function __construct() {
        $this->card = new Card();
    }

    public function cardListing() {
        return $this->card->with('colour')->where('status', '=', 'Active')->get();
    }

    

  

}
