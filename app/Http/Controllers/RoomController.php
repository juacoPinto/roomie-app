<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index()
    {
        return view('room.index');
    }

    public function create()
    {
        $communes = Commune::all()->sortBy('name');

        return view('room.create')->with('communes', $communes);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $room = new Room();

        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->has('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            //$path = 'images/';

            $image->move('images/', $filename);
        }

        $room->user_id = $user->id;
        $room->preferred_gender = request('preferred_gender');
        $room->bathroom = request('bathroom');
        $room->parking = request('parking');
        $room->internet = request('internet');
        $room->private = request('private');
        $room->furnished = request('furnished');
        $room->accessible = request('accessible');
        $room->background_check = request('background_check');
        $room->pet  = request('pet');
        $room->children = request('children');
        $room->about_property = request('about_property');
        $room->about_roomies = request('about_roomies');
        $room->location = request('location');
        $room->type = request('type');
        $room->price  = request('price');
        $room->image = '';

        $room->update(['image' => 'images/' . $filename]);


        $room->save();

        //$room->update(['image' => 'images/' . $filename]);

        return redirect('/room/' . $room->id)->with('room', $room);
    }

    public function show(Room $room)
    {
        return view('room.show')->with('room', $room);
    }
}
