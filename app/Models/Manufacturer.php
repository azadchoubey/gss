<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    public function vehicletype(){
        return $this->belongsTo(VehicleType::class,'v_id','id');
    }
}
