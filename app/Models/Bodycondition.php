<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodycondition extends Model
{
    use HasFactory;

    public function valuationmodel(){
        $this->hasMany(ValuationModel::class,'id','body_condition');
    }
}
