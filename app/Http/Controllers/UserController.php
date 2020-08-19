<?php

namespace App\Http\Controllers;

use App\User;
use App\Hobby;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\BaseRepository;
class UserController extends Controller {

    protected $user;
    protected $base;

    public function __construct() {
        $this->user = new UserRepository();
        $this->base= new BaseRepository(new Hobby());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->ajax()) {

            return datatables($this->user->userListing($request->all()))
                            ->addColumn('action', function ($users) {
                                return '<a href="javascript:void(0);" onclick="changeStatus(this)"  data-url="#" class="btn btn-primary">Send Request</a>
                                        <a href="javascript:void(0);" onclick="deleteRecord(this)"  data-url="#" class="btn btn-danger delete-confirm" title="Delete">Block</a>';
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        $data['hobbies']=$this->base->listing(['is_active'=>'1']);
       
        return view('user.index',$data);
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

}
