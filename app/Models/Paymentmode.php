<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentmode extends Model
{
    use HasFactory;

    public function payment(){
        return $this->hasMany(ValuationModel::class,'id','payment_mode');
    }
}
