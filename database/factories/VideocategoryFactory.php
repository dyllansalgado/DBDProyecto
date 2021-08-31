<?php

namespace Database\Factories;

use App\Models\Videocategory;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideocategoryFactory extends Factory
{
    protected $model = Videocategory::class;
    public function definition()
    {
        return [
            'ID_Video' => Video::all()->random()->id,
            'ID_Categoria' => Category::all()->random()->id,
        ];
    }
}
