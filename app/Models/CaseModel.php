<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseModel extends Model
{
    use HasFactory;

   public function fo(){
       return $this->belongsTo(Fo::class);
   }
   public function companies(){
       return $this->belongsTo(Company::class,'company_name','id');
   }
   public function c_branch(){
       return $this->belongsTo(CompanyBranch::class,'company_branch','id');
   }
   public function vehicle_cat(){
    return $this->belongsTo(VehicleType::class,'vehicle_category','id');
   }
   public function demagess(){
    return $this->hasMany(CaseDamages::class,'case_id','id');
   }
   public function manufacturers(){
    return $this->belongsTo(Manufacturer::class,'vehicle_manufacturer','id');
   }
   public function fual(){
    return $this->belongsTo(Fuel::class,'fuel_used','id');
   }
   public function casetypes(){
    return $this->belongsTo(Casetype::class,'case_type','id');
   }
   public function ins_status(){
    return $this->belongsTo(InspectionStatus::class,'inspection_status','id');
   }
   public function paymnet(){
    return $this->belongsTo(Paymentmode::class,'payment_mode','id');
   }
   public function qcid(){
    return $this->belongsTo(User::class,'qc_id','id');
   }
}
