<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Playlistvideo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function playlist(){
        return $this->belongsTo(Playlist::class);
    }
    public function video(){
        return $this->belongsTo(Video::class);
    }
}
