<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function uservideo(){
        return $this->hasMany(Uservideo::class);
    }
    public function playlistvideo(){
        return $this->hasMany(Playlistvideo::class);
    }
    public function videocategory(){
        return $this->hasMany(Videocategory::class);
    }
    public function commentary(){
        return $this->hasMany(Commentary::class);
    }
    public function donation(){
        return $this->hasMany(Donation::class);
    }
}
