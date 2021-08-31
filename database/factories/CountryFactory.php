<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition()
    {
        return [
            'Nombre_Pais' => $this->faker->unique()->randomElement($array = array ('Chile')),
        ];
    }
}
