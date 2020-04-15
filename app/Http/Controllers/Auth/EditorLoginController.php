<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class EditorLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $guard='editor';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'editor/area';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('layouts_editor.editorLogin');
    }

    public function login(Request $request)
    {
        if (auth()->guard('editor')->attempt(['correo' => $request->correo, 'password' => $request->password]))
        {
            return redirect()->route('editor.index');
        }

        return back()->withErrors(['correo' => 'Correo o contraseña incorrecto(s)']);
    }
}
