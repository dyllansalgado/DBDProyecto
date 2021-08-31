<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory
{
    protected $model = Region::class;

    public function definition()
    {
        return [
            'Nombre_Region' => $this->faker->unique()->randomElement($array = array ('Tarapaca','Atacama','Region Metropolitana')),
            'ID_Pais' => Country::all()->random()->id,
        ];
    }
}
