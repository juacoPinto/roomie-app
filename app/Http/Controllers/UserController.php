<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view ('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email','max:255','unique:users'],
            'password' => ['required','min:6','confirmed'],
            'phone' => ['required','min:9','max:13'],
            'address' => ['required','max:255'],
            'user_type' => ['required'],
        ]);

        $user = User::create($validatedData);

        return redirect('/');
    }
}
