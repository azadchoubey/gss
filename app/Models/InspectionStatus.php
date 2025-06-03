<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionStatus extends Model
{
    use HasFactory;
    public function inspection(){
        return $this->hasMany(CaseModel::class,'id','inspection_status');
    }
}
