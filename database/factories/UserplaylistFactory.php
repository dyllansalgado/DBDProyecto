<?php

namespace Database\Factories;

use App\Models\Userplaylist;
use App\Models\User;
use App\Models\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserplaylistFactory extends Factory
{
    protected $model = Userplaylist::class;

    public function definition()
    {
        return [
            'ID_Usuario' => User::all()->random()->id,
            'ID_Playlist' => Playlist::all()->random()->id,
        ];
    }
}
