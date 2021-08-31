<?php

namespace Database\Factories;

use App\Models\Userrole;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserroleFactory extends Factory
{
    protected $model = Userrole::class;

    public function definition()
    {
        return [
            'ID_Usuario' => User::all()->random()->id,
            'ID_Rol' => Role::all()->random()->id,
        ];
    }
}
