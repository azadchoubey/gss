<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseDamages extends Model
{
    use HasFactory;

    public function cases(){
        return $this->belongsTo(CaseModel::class,'case_id','id');
    }
    public function dem(){
        return $this->belongsTo(VehicleDamage::class,'values','id');

    }
}
