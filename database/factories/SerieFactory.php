<?php

namespace Database\Factories;

use App\Models\Serie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SerieFactory extends Factory
{

    protected $model = Serie::class;

    public function definition()
    {
        return [
            'Titulo'=> $this->faker->text($maxNbChars = 64),
            'Descripcion'=> $this->faker->text($maxNbChars = 240),

            'ID_Usuario' => User::all()->random()->id,
        ];
    }
}
