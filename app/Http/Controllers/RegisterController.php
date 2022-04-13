<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $roles= Role::all();
        return view('auth.register',['roles' => $roles]);
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {   
        $request->validated();
        $user = new User();
        $user->name = $request -> input('name');
        $user->surname = $request -> input('surname');
        $user->email = $request -> input('email');
        $user->username  = $request -> input('username');
        $user->password  = $request -> input('password');
        $user->role_id = $request -> input('role');
        $user->save();

        auth()->login($user);

        return redirect('/')->with('success', "Zarejestrowano użytkownika!");
    }
}