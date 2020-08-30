<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rider;
use App\Hobby;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Repositories\BaseRepository;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $hobby;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
        $this->hobby = new BaseRepository(new Hobby());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:riders'],
                    'password' => ['required', 'string', 'min:6'],
                    'gender' => ['required'],
                    'phone' => ['required', 'digits:10'],
                    'birth_day' => ['required', 'numeric', 'min:1', 'max:31'],
                    'birth_month' => ['required', 'numeric', 'min:1', 'max:12'],
                    'birth_year' => ['required', 'numeric', 'min:1950', 'max:' . date('Y')],
                    'profile_pic' => ['required', 'image'],
                    'hobbies' => ['array', 'min:1', 'required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return 
     */
    protected function create(array $data) {
        $array = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'birth_day' => $data['birth_day'],
            'birth_month' => $data['birth_month'],
            'birth_year' => $data['birth_year'],
            'about_me' => $data['about_me'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'profile_pic' => $this->hobby->uploadFile((object) $data['profile_pic'])
        ];
        $query = Rider::create($array);
        $query->hobbies()->sync($data['hobbies']);
        return $query;
    }

    public function showRegistrationForm() {
        $data['hobbies'] = $this->hobby->listing(['status' => 'Active']);
        return view('auth.register', $data);
    }

}
