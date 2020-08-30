<?php

namespace App\Http\Controllers\Auth;

use App\Driver;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
class DriverAuthController extends Controller {

    protected $base;

    public function __construct() {
        $this->base = new BaseRepository(new Driver());
    }

    public function register() {

        return view('auth.driver_register');
    }

    public function store(Request $request) {

        if ($request->ajax()) {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:drivers'],
                'password' => ['required', 'string', 'min:6'],
            ]);
            try {
                $oldPass = $request->password;
                $request['password'] = bcrypt($request->password);
                $this->base->create($request->all());
                if (Auth::guard('drivers')->attempt(['email' => $request->email, 'password' => $oldPass])) {
                    return ['message' => 'Register successfully', 'status' => true, 'url' => route('driver.home')];
                } else {
                    throw new \Exception("invalid credentials");
                }
            } catch (\Exception $e) {
                return ['message' => 'Invalid aceess', 'status' => $e->getMessage()];
            }
        } else {
            return ['message' => 'Invalid aceess', 'status' => false];
        }
    }
     public function login() {

        return view('auth.driver_login');
    }
     public function loginPost(Request $request) {

        if ($request->ajax()) {
            $this->validate($request, [
                'email' => ['required',  'email'],
                'password' => ['required'],
            ]);
            try {
                if (Auth::guard('drivers')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return ['message' => 'Login successfully', 'status' => true, 'url' => route('driver.home')];
                } else {
                    throw new \Exception("invalid credentials");
                }
            } catch (\Exception $e) {
                return ['message' => 'Invalid aceess', 'status' => $e->getMessage()];
            }
        } else {
            return ['message' => 'Invalid aceess', 'status' => false];
        }
    }
    
    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
