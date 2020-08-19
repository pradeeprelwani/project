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

    /**
     * Display the specified resource.
     *
     * @param  \App\UserHobby  $userHobby
     * @return \Illuminate\Http\Response
     */
    public function show(UserHobby $userHobby) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserHobby  $userHobby
     * @return \Illuminate\Http\Response
     */
    public function edit(UserHobby $userHobby) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserHobby  $userHobby
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserHobby $userHobby) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserHobby  $userHobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserHobby $userHobby) {
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
            unset($data['user_id']);
            Auth::user()->following()->attach($data);
            return redirect()->back()->with('success', "Request sent");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function blockUser(Request $request) {
        try {

            $data['user_following_id'] = (int) $request->user_id;
            $data['user_id'] = Auth::user()->id;

            Auth::user()->blocked()->attach($data);
            return redirect()->back()->with('success', "Blocked");
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
            $data['status']='accepted';
            $this->userFriend->update($data, $request->request_id);
            return redirect()->back()->with('success', "Request Accepted");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
