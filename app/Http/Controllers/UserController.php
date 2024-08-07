<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(4);
        return view('welcome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      User::create([
        'user_name' => $request->username,
        'email' => $request->useremail,
        'salary' => $request->usersalary,
        'dob' => $request->userdob,
        'password' => $request->userpassword,
      ]);
      return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $user= User::find($id);
       return view('user',compact('user'));
    // return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $user = User::find($id);
        return view('updateuser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::find($id)->update([
         'user_name' => $request->username,
        'email' => $request->useremail,
        'salary' => $request->usersalary,
        'dob' => $request->userdob,
        'password' => $request->userpassword,
        ]
    );

    return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index');

    }
}
