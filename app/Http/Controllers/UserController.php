<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

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
            'password' => ['required','min:6','confirmed',Password::min(8)->letters()->numbers()->symbols()],
            'phone' => ['required','min:9','max:13'],
            'address' => ['required','max:255'],
            'user_type' => ['required'],
        ]);

        $user = User::create($validatedData);

        Auth::login($user);

        return redirect('/profile')->with('user', $user);
    }
}
