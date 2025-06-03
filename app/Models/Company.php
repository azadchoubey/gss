<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function branch(){
        return $this->hasMany(CompanyBranch::class,'c_id','id');
    }
    public function case(){
        return $this->hasMany(CaseModel::class,'company_name','id');
    }
}
