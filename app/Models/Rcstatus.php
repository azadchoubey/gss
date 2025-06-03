<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rcstatus extends Model
{
    use HasFactory;

    public function rc()
    {
        return $this->hasMany(ValuationModel::class, 'id', 'rc_status');
    }
}
