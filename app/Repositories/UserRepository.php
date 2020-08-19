<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository {

    protected $user;

    public function __construct() {
        $this->user = new User();
    }

    public function userListing($data) {
        $query = $this->user;
        if (isset($data['gender']) && $data['gender'] != "") {
            $query->where('gender', $data['gender']);
        }
        return $query->where('id', '!=', Auth::user()->id)->get();
    }

}
