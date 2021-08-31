<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition()
    {
        return [
            'Nombre' => $this->faker->unique()->randomElement($array = array ('Accion','Ciencia Ficcion','Drama','Fantasia','Terror','Suspenso')),
        ];
    }
}
