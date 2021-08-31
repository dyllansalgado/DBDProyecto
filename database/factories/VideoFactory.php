<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;
    public function definition()
    {
        return [
            //Valor random para los likes
            'Likes'=> $this->faker->numberBetween($min = 0, $max = 2147483647),
            'Descripcion'=> $this->faker->text($maxNbChars = 240),
            'Titulo'=> $this->faker->text($maxNbChars = 64),
            'Autor'=> $this->faker->userName,
            'Restriccion'=> $this->faker->boolean,
            'Cantidad_reproducciones'=> $this->faker->numberBetween($min = 0, $max = 2147483647),
            'FechaPublicacion'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'Visibilidad'=> $this->faker->boolean,

        ];
    }
}
