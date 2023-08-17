<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login'; // Change this to the login route

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->deactivated) {
            $this->guard()->logout();
            return redirect()->route('login')->with('warning', 'Account is deactivated. Please contact support.');
        }

        return redirect()->intended($this->redirectPath());
    }
}

