<?php

namespace App\Http\Controllers;

use App\User;
use App\Hobby;
use App\UserFriend;
use App\UserBlock;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    protected $user;
    protected $base;
    protected $userFriend;
    protected $userBlocked;

    public function __construct() {
        $this->user = new UserRepository();
        $this->base = new BaseRepository(new Hobby());
        $this->userFriend = new BaseRepository(new UserFriend());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $data['users'] = $this->user->userListing($request->all());
        $data['hobbies'] = $this->base->listing(['is_active' => '1']);

        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    public function sendRequest(Request $request) {
        try {

            $data['user_following_id'] = (int) $request->user_following_id;
            $data['user_id'] = Auth::user()->id;
            $ifAlreadyFollow = $this->user->checkIfAlreadyFollowing($data);
            if ($ifAlreadyFollow > 0) {
                throw new \Exception("Already following this account");
            }
            $this->userFriend->create($data);
            return redirect()->back()->with('success', "Request sent");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function blockUser(Request $request) {
        try {

            $data['block_user_id'] = (int) $request->user_id;
            $data['user_id'] = Auth::user()->id;
            $isBlock = UserBlock::where($data)->count();
            if ($isBlock) {
                throw new \Exception("Already blocked this account");
            }
            UserBlock::create($data);
            Auth::user()->blocked()->attach($data);
            return redirect()->back()->with('success', "Blocked");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function myFriends(Request $request) {
        try {
            $data['users'] = $this->user->myFriends();
            return view('user.friend', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function pendingRequests(Request $request) {
        try {
            $data['users'] = $this->user->getPendingRequests();
            return view('user.pending_requests', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function acceptRequest(Request $request) {
        try {
            $user = UserFriend::findOrFail($request->request_id);
            $user->status = 'accepted';
            $user->save();
            return redirect()->back()->with('success', "Request Accepted");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function deleteRequest(Request $request) {
        try {
            UserFriend::destroy($request->request_id);
            return redirect()->back()->with('success', "Request Rejected");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
