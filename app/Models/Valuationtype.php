<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valuationtype extends Model
{
    use HasFactory;

    public function valuation_case()
    {
        return $this->hasMany(ValuationModel::class, 'id', 'valuation_case_type');
    }
    
}
