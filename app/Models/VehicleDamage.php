<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleDamage extends Model
{
    use HasFactory;

    public function vparts(){
        return $this->belongsTo(Vehicle_parts::class,'vp_id','id');
    }
    public function cased(){
        return $this->hasMany(CaseDamages::class,'values','id');
    }
}
