<?php

namespace Database\Factories;

use App\Models\Commentary;
use App\Models\Video;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentaryFactory extends Factory
{
    protected $model = Commentary::class;
    public function definition()
    {
        return [
            'Autor'=> $this->faker->userName,
            'Contenido'=>$this->faker->text($maxNbChars = 240),
            'ID_Video' => Video::all()->random()->id,
            'ID_Usuario' => User::all()->random()->id,

        ];
    }
}
