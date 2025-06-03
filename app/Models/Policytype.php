<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policytype extends Model
{
    use HasFactory;

    public function policy()
    {
        return $this->hasMany(ValuationModel::class, 'id', 'insurance_policy');
    }
}
