<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete();
            $table->string('preferred_gender');
            $table->string('bathroom');
            $table->string('parking');
            $table->string('internet');
            $table->string('private');
            $table->string('furnished');
            $table->string('accessible');
            $table->string('background_check');
            $table->string('pet');
            $table->string('children');
            $table->string('about_property');
            $table->string('about_roomies');
            $table->string('location');
            $table->string('type');
            $table->float('price');
            $table->date('available_from')->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * 'user_id',
     * 'preferred_gender',
     * 'bathroom',
     * 'parking',
     * 'internet',
     * 'private',
     * 'furnished',
     * 'accessible',
     * 'background_check',
     * 'pet',
     * 'children',
     * 'about_property',
     * 'about_roomies',
     * 'location',
     * 'type',
     * 'price',
     * 'available_from',
     * 'description'
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
