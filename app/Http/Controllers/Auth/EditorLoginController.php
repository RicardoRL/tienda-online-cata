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
            return redirect()->route('editor.index');
        }
        /*if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }*/

        return back()->withErrors(['correo' => 'Correo o contraseña incorrecto(s)']);
    }

    /*public function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    public function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    public function sendLoginResponse(Request $request)
    {
        return redirect()->route('editor.index');
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended($this->redirectPath());
    }*/
}
