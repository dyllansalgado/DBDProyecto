<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function commune(){
        return $this->belongsTo(Commune::class);
    }
    public function userplaylist(){
        return $this->hasMany(Userplaylist::class);
    }
    public function followed(){
        return $this->hasMany(Followerfollowed::class);
    }
    public function follower(){
        return $this->hasMany(Followerfollowed::class);
    }
    public function uservideo(){
        return $this->hasMany(Uservideo::class);
    }
    public function commentary(){
        return $this->hasMany(Commentary::class);
    }
    public function donation(){
        return $this->hasMany(Donation::class);
    }
    public function serie(){
        return $this->hasMany(Serie::class);
    }

    public function userrole(){
        return $this->hasMany(Userrole::class);
    }

}
