<?php

namespace Database\Factories;

use App\Models\Uservideo;
use App\Models\Video;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UservideoFactory extends Factory
{
    protected $model = Uservideo::class;
    public function definition()
    {
        return [
            'ID_Video' => Video::all()->random()->id,
            'ID_Usuario' => User::all()->random()->id,

        ];
    }
}
