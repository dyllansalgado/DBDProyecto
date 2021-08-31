<?php

namespace Database\Factories;

use App\Models\Playlistvideo;
use App\Models\Video;
use App\Models\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistvideoFactory extends Factory
{
    protected $model = Playlistvideo::class;
    public function definition()
    {
        return [
            'ID_Video' => Video::all()->random()->id,
            'ID_Playlist' => Playlist::all()->random()->id,
        ];
    }
}
