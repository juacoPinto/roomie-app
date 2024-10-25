<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function create()
    {
        return view ('user.create');
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

        return redirect('/image');
    }

    public function show(User $user)
    {
        return view ('user.show')->with('user',$user);
    }

    public function edit(User $user)
    {
        //$loggedUser = Auth::user();
        //$userToEdit = $user;
        //dd($loggedUser->is(Auth::user()));
        //dd($loggedUser->is($userToEdit));
        //dd($user->id, $loggedUser->id );


//        if(Auth::guest())
//        {
//            return redirect('/login');
//        }
        //dd($loggedUser);
        //Gate::authorize('edit-user', $user);

        return view ('user.edit')->with('user',$user);
    }

    public function update(Request $request, User $user)
    {

        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email','max:255'],
            'phone' => ['required','min:9','max:13'],
            'address' => ['required','max:255'],
            'user_type' => ['required']
        ]);

        $user->update($validatedData);

        return redirect('/dashboard');
    }
}
