<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showProfile()
    {
        $users = User::all(); // Fetch all users from the database

        return view('profileAll', ['users' => $users]);
    }

    public function getUserData($id)
    {
        $user = User::find($id);
        
        if ($user) {
            return response()->json([
                'username' => $user->name,
                'birthday' => $user->birthday,
                'email' => $user->email,
                'aboutMe' => $user->aboutMe,
            ])->header('Content-Type', 'application/json');
        } else {
            return response()->json(['error' => 'User not found'])->header('Content-Type', 'application/json');
        }
    }
    
}