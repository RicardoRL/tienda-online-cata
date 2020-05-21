<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Cliente;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = '/inicio';

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
        'nombre' => ['required', 'string', 'max:50'],
        'apepat' => ['required', 'string', 'max:50'],
        'apemat' => ['required', 'string', 'max:50'],
        'fecnac' => ['required', 'date'],
        'correo' => ['required', 'string', 'email', 'max:100', 'unique:clientes'],
        'password' => ['required', 'string', 'min:8'],
        'telefono' => ['required', 'string', 'min:10'],
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
      return Cliente::create([
        'nombre' => $data['nombre'],
        'apepat' => $data['apepat'],
        'apemat' => $data['apemat'],
        'fecnac' => $data['fecnac'],
        'correo' => $data['correo'],
        'password' => Hash::make($data['password']),
        'telefono' => $data['telefono'],
      ]);
    }
}
