<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function video(){
        return $this->belongsTo(Video::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function paymentmethod(){
        return $this->belongsTo(Paymentmethod::class);
    }
}
