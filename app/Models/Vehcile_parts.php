<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehcile_parts extends Model
{
    use HasFactory;

    public function vtype(){
        return $this->belongsTo(Vehicletype::class,'id','v_id');
    }
    public function vdamage(){
        return $this->hasMany(VehicleDamage::class,'vp_id','id');
    }
}
