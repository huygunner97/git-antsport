<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
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

    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['nullable', 'max:255'],
            'phone' => ['nullable', 'size:10'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $new_user = User::create([
            'name' => $data['name'],
            'email' => time().$data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(60),
        ]);

        if (isset($data['address']) && !isset($data['phone'])) {
            UserInformation::create([
                'user_id' => $new_user->id,
                'address' => $data['address'],
            ]);
        } elseif (isset($data['phone']) && !isset($data['address'])) {
            UserInformation::create([
                'user_id' => $new_user->id,
                'phone' => $data['phone'],
            ]);
        } elseif (isset($data['address']) && isset($data['phone'])) {
            UserInformation::create([
                'user_id' => $new_user->id,
                'phone' => $data['phone'],
                'address' => $data['address'],
            ]);
        }
        return $new_user;
    }
}
