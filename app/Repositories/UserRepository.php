<?php

namespace App\Repositories;

use App\User;
use App\UserFriend;
use App\UserBlock;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository {

    protected $user;
    protected $userFriend;

    public function __construct() {
        $this->user = new User();
        $this->userFriend = new UserFriend();
    }

    public function userListing($data) {
        $blockUser = UserBlock::where('user_id', Auth::user()->id)->pluck('block_user_id');
        $blockFriends = UserFriend::where('user_id', Auth::user()->id)->pluck('user_following_id');
        $query = User::select('u.id', 'u.name', 'u.email', 'u.created_at', 'u.gender')->from('users as u')
                ->leftJoin('user_blocks as ub', 'ub.user_id', '=', 'u.id')
                ->leftJoin('user_hobbies as uh', 'uh.user_id', '=', 'u.id')
                ->where('u.id', '!=', Auth::user()->id)
                ->whereNotIn('u.id', $blockUser)
                ->whereNotIn('u.id', $blockFriends);
        if (isset($data['gender']) && $data['gender'] != "") {
            $query = $query->where('u.gender', ucfirst($data['gender']));
        }
        if (isset($data['hobbies']) && $data['hobbies'] != "") {
            $query = $query->where('uh.id', '=', $data['hobbies']);
        }
        $query = $query->groupBy('u.id', 'u.name', 'u.email', 'u.created_at', 'u.gender')->paginate(10);
        return $query;
    }

    public function getPendingRequests() {
        $query = User::select('uf.id as request_id', 'u.id', 'u.name', 'u.email', 'u.created_at', 'u.gender')->from('users as u')
                ->join('user_friends as uf', 'uf.user_following_id', '=', 'u.id')
                ->where('uf.status', '=', 'pending')
                ->where('uf.user_following_id', '=', Auth::user()->id)
                ->where('uf.user_id', '!=', Auth::user()->id);
        $query = $query->paginate(10);

        return $query;
    }

    public function myFriends() {
        $query = User::select('uf.id as request_id', 'u.id', 'u.name', 'u.email', 'u.created_at', 'u.gender')->from('users as u')
                ->join('user_friends as uf', 'uf.user_following_id', '=', 'u.id')
                ->where('uf.status', '=', 'accepted')
                ->where('uf.user_following_id', '!=', Auth::user()->id)
                ->where('uf.user_id', '=', Auth::user()->id);
        $query = $query->paginate(10);

        return $query;
    }

    public function checkIfAlreadyFollowing($condition) {
        $condition['status'] = 'pending';
        return $this->userFriend->where($condition)->count();
    }

}
