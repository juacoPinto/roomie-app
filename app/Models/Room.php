<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'preferred_gender',
        'bathroom',
        'parking',
        'internet',
        'private',
        'furnished',
        'accesible',
        'background_check',
        'pet',
        'children',
        'about_property',
        'about_roomies',
        'location',
        'type',
        'price',
        'available_from',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
