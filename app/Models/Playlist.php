<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function serie(){
        return $this->belongsTo(Serie::class);
    }
    public function userplaylist(){
        return $this->hasMany(Userplaylist::class);
    }
    public function playlistvideo(){
        return $this->hasMany(Playlistvideo::class);
    }
}
