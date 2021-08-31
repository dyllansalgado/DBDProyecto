<?php

namespace Database\Factories;

use App\Models\Playlist;
use App\Models\Serie;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistFactory extends Factory
{

    protected $model = Playlist::class;

    public function definition()
    {
        return [
            'Nombre'=> $this->faker->text($maxNbChars = 64),
            'Descripcion'=> $this->faker->text($maxNbChars = 240),
            
            'ID_Serie' => Serie::all()->random()->id,
        ];
    }
}
