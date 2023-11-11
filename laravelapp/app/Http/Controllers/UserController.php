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

    public function index()
     {
         $users = User::orderBy('id', 'desc')->paginate(20);
         return view('users.index', compact('users'));
     }
 
     // Show the form for creating a new user
     public function create()
     {
         return view('users.create');
     }
 
     // Store a newly created user in storage
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required',
            //   'email' => 'required|email|unique:users',
            //   'birthday' => 'required',
            //   'aboutMe' => 'nullable',
         ]);
 
         User::create($request->post());

         return redirect()->route('users.index')->with('success','User has been created successfully.');
     }
 
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|min:6',
            //'email_verified_at' => 'nullable|date',
            // 'image' =>'nullable',
            // 'is_admin' => 'boolean', 
            // 'birthday' => 'date',
            // 'aboutMe' => 'nullable',
        ]);
        
        
        $user->fill($request->post())->save();

        return redirect()->route('users.index')->with('success','User Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Delete related vacancies
        $user->vacancies()->delete();
    
        // Now, delete the user
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'User and associated vacancies have been deleted successfully.');
    }
    

}