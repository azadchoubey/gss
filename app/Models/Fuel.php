<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;
    public function fueltype(){
        return $this->hasMany(CaseModel::class,'id','fuel_used');
    }
}
