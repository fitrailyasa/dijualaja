<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = RouteServiceProvider::VERIF;

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
        return Validator::make($data, 
        [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_telepon' => ['string', 'min:10', 'max:16'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ],   
        [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.string' => 'Nama harus berupa string',
            'nama.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'email.string' => 'Email harus berupa string',
            'email.email' => 'Email harus berupa email',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'no_telepon.string' => 'No Telepon harus berupa string',
            'no_telepon.min' => 'No Telepon minimal 10 karakter',
            'no_telepon.max' => 'No Telepon maksimal 16 karakter',
            'password.required' => 'Password tidak boleh kosong',
            'password.string' => 'Password harus berupa string',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'no_telepon' => $data['no_telepon'],
            'password' => Hash::make($data['password'])
        ]);
    }

}
