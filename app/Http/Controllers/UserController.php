<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function show($firstName)
    {
        $user = User::where('first_name', $firstName)->firstOrFail();
        return response()->json(['user' => $user]);
    }
    

    public function profile()
    {
        $user = auth()->user();
        return response()->json(['user' => $user]);
    }
}

