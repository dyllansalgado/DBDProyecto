<?php

namespace Database\Factories;

use App\Models\Followerfollowed;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FollowerfollowedFactory extends Factory
{
    protected $model = Followerfollowed::class;

    public function definition()
    {
        return [
            'ID_Seguidor' => User::all()->random()->id,
            'ID_Seguido' => User::all()->random()->id,
        ];
    }
}
