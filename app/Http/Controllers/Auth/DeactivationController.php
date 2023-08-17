<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DeactivationController extends Controller
{
    public function deactivate(User $user)
    {
        $user->update(['status' => 'inactive', 'deactivated' => true]);
    
        return redirect()->route('login')->with('success', 'Account deactivated.');
    }
}

