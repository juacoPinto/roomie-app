<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function create(User $user)
    {
        return view('profile.create')->with('user', $user);
    }

    public function store(User $user)
    {
        $profile = new Profile();

        $loggedUser = auth()->user();

        $foreignKey = $loggedUser->id;
        /**VALIDACIONES PENDIENTES*/
        $profile->user_id = $foreignKey;
        $profile->age = request('age');
        $profile->move_date = request('move_date');
        $profile->occupation = request('occupation');
        $profile->children = request('children');
        $profile->pet = request('pet');
        $profile->smoker  = request('smoker');
        $profile->gender = request('gender');
        $profile->description = request('description');

        $profile->save();


/**
        $validatedData = request()->validate([
            'age'=>['required','string','min:1'],
            'move_date'=>[],
            'occupation'=>['required','string','min:1'],
            'children'=>['required','string','min:1'],
            'pet'=>['required','string','min:1'],
            'smoker'=>['required','string','min:1'],
            'gender'=>['required','string','min:1'],
            'description'=>['required','string','min:1'],
        ]);

        var_dump($profile['user_id']);exit();

        Profile::create($validatedData);
*/
        return redirect('/profile/' . $foreignKey);
    }

    public function show(Profile $profile)
    {
        $loggedUser = auth()->user();
        //dd($user);
        return view('profile.show')->with('profile', $profile)->with('loggedUser', $loggedUser);
    }

    public function edit(Profile $profile)
    {
        $loggedUser = auth()->user();

        return view('profile.edit')->with('loggedUser', $loggedUser)->with('profile', $profile);
    }

    public function update(Profile $profile)
    {

        $validatedData = request()->validate([
            'age' => 'required',
            'move_date' => [],
            'occupation' => 'required',
            'children' => 'required',
            'pet' => 'required',
            'smoker' => 'required',
            'gender' => 'required',
            'description' => 'required'
        ]);

        $profile->update($validatedData);

        return redirect('/profile/' . $profile->id);
    }

}
