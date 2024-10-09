<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('age');
            $table->date('move_date')->nullable();
            $table->string('occupation');
            $table->string('children');
            $table->string('pet');
            $table->string('smoker');
            $table->string('gender');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * 'age',
     * 'move_date',
     * 'occupation',
     * 'children',
     * 'pet',
     * 'smoker',
     * 'gender',
     * 'description'
 * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
