<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

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
            'user_id' => [],
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
        return redirect('/image');
    }

    public function show(User $user)
    {
        $loggedUser = auth()->user();

        $profileToShow = $user->profile;

        //dd($profileToShow['age']);
        return view('profile.show')->with('profileToShow', $profileToShow)->with('loggedUser', $loggedUser);
    }

    public function edit(User $user)
    {
        $loggedUser = auth()->user();

        return view('profile.edit')->with('loggedUser', $loggedUser);
    }

    public function update()
    {
        $loggedUser = auth()->user();

        $profile = $loggedUser->profile;

        //dd($profile);

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

        return redirect('/profile/' . $loggedUser->id);
    }

}
