<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Override the authenticated method to handle JSON response for API login
    protected function authenticated(Request $request, $user)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Login successful.',
                'user' => $user,
            ]);
        }

        if ($user->deactivated) {
            $this->guard()->logout();
            return redirect()->route('login')->with('warning', 'Account is deactivated. Please contact support.');
        }

        return redirect()->intended($this->redirectPath());
    }
}
