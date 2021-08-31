<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Commune;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'Username' => $this->faker->unique()->randomElement($array = array ('Jaime','Dyllan','Damian','Adolfo')),
            'Pass' => $this->faker->password,
            'Edad'=> $this->faker->numberBetween($min = 0, $max = 120),
            'CorreoElectronico' => $this->faker->email,
            'FechaNacimiento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'ID_Comuna' => Commune::all()->random()->id,
        ];
    }
}
