<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;

    public function manufacturer(){
        return $this->hasMany(Manufacturer::class,'v_id','id');
    }
    public function parts(){
        return $this->hasMany(Vehcile_parts::class,'v_id','id')->with('vdamage');
    }
    public function imagetype(){
        return $this->hasMany(Imageparts::class,'vp_id','id');

    }
    public function casemodel(){
        return $this->hasMany(CaseModel::class,'vehicle_category','id');
    }
}
