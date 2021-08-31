<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition()
    {
        return [
            'Tipo' => $this->faker->unique()->randomElement($array = array ('SuperUsuario','Usuario')),
        ];
    }
}
