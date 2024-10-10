<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function create()
    {
        return view('image.create');
    }

    public function store(User $user, Request $request)
    {
        $loggedUser = auth()->user();

        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
        ]);


        if($request->has('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            //$path = 'images/';

            $image->move('images/', $filename);
        }

        //$loggedUser['image'] = $path . $filename;
        $loggedUser->update(['image' => 'images/' . $filename]);
        //dd('images/', $filename);
        return redirect('/profile/' . $loggedUser->id);
    }
}
