<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casetype extends Model
{
    use HasFactory;

    public function casetype(){
        return $this->hasMany(CaseModel::class,'id','case_type');
    }
}
