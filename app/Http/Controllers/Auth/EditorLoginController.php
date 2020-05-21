<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //dd($this->validateLogin($request);

        if (auth()->guard('editor')->attempt(['correo' => $request->correo, 'password' => $request->password]))
        {
            //dd(auth()->guard('editor')->user()->nombre);
            return redirect()->route('editor.index')
                ->with(['logeado'=>'Mensaje',
                ]);
        }
        /*if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }*/

        return back()->withErrors(['correo' => 'Correo o contraseña incorrecto(s)']);
    }

    public function logout(Request $request)
    {
        $this->guard('editor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            //: redirect('/');
            : redirect('/editor/login');
    }
}
