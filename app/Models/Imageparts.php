<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageparts extends Model
{
    use HasFactory;

    public function type(){
        return $this->belongsTo(VehicleType::class,'vp_id','id');
    }
}
