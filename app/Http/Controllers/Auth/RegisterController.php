<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'name'          => ['required', 'string', 'max:255'],
            'nik'           => ['required', 'numeric', 'min:16'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telp'          => ['required', 'numeric', 'min:12',],
            'password'      => ['required', 'string', 'min:6', 'confirmed'],
        
        ],[
            'name.required'         => 'Nama harus diisi!',
            'telp.required'         => 'Nomor telpon harus diisi!',
            'telp.digits_between'   => 'Nomor telpon maksimal 13 karakter!',
            'nik.required'          => 'Nik harus diisi!',
            'nik.digits'            => 'Nik maksimal 16 karakter!',
            'email.required'        => 'Email harus diisi!',
            'email.email'           => 'Email harus berupa email!',
            'email.unique'          => 'Email sudah terdaftar!',
            'password.required'     => 'Password harus diisi!',
            'password.min'          => 'password minimal 6 karakter!',
            'password.confirmed'    => 'password tidak sama!',
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
        $user           = User::create([
            'name'      => $data['name'],
            'nik'       => $data['nik'],
            'email'     => $data['email'],
            'telp'      => $data['telp'],
            'password'  => Hash::make($data['password']),
        ]);

        $role           = Role::select('id')->where('name', 'masyarakat')->first();
        $user->roles()->attach($role);

        return $user;
    }
}
