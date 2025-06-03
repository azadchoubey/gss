<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
class Case_export implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $request;
public function __construct($request)
{
    $this->request = $request;
}
    public function collection()
    {
        $request = $this->request;
        if(isset($request->ro_user_id)){
            // return $request->all();
            for($i=0;$i<count($request->ro_user_id);$i++){
                return CaseModel::with('companies','c_branch','vehicle_cat','manufacturers','casetypes','ins_status','paymnet')->where(['case_by'=>$request->ro_user_id[$i],'pdfstatus'=>1])->whereBetween('created_at',[$request->startdate.' 00:00:00',$request->enddate.' 23:59:59'])->get();
            }   
        }
        if(isset($request->i_c)){
            for($i=0;$i<count($request->i_c);$i++){
                if(Auth::user()->role_id != 1){
                    return CaseModel::with('companies','c_branch','vehicle_cat','manufacturers','casetypes','ins_status','paymnet')->where(['case_by'=>Auth::user()->id,'company_name'=>$request->i_c[$i],'pdfstatus'=>1])->orWhere('case_by', Auth::user()->parent_id != 0 ? Auth::user()->parent_id : '')->whereBetween('created_at',[$request->startdate.' 00:00:00',$request->enddate.' 23:59:59'])->get();
                }else{
                    return CaseModel::with('companies','c_branch','vehicle_cat','manufacturers','casetypes','ins_status','paymnet')->where(['company_name'=>$request->i_c[$i],'pdfstatus'=>1])->whereBetween('created_at',[$request->startdate.' 00:00:00',$request->enddate.' 23:59:59'])->get();
                }
            }   
        }else{
            if(Auth::user()->role_id != 1){
               return CaseModel::with('companies','c_branch','vehicle_cat','manufacturers','casetypes','ins_status','paymnet')->where(['case_by'=>Auth::user()->id,'pdfstatus'=>1])->orWhere('case_by', Auth::user()->parent_id != 0 ? Auth::user()->parent_id : '')->whereBetween('created_at',[$request->startdate.' 00:00:00',$request->enddate.' 23:59:59'])->get();
            }else{
               return CaseModel::with('companies','c_branch','vehicle_cat','manufacturers','casetypes','ins_status','paymnet')->where(['pdfstatus'=>1])->whereBetween('created_at',[$request->startdate.' 00:00:00',$request->enddate.' 23:59:59'])->get();
            }
        }
    }
   
    public function map($CaseModel) : array {

        return [

            $CaseModel->id,
            $CaseModel->companies->Company_name,
            $CaseModel->c_branch->branch_name,
            $CaseModel->insurance_ref,
            $CaseModel->req_no,
            $CaseModel->req_name,
            $CaseModel->req_code,
            $CaseModel->req_email,
            $CaseModel->customer_name,
            $CaseModel->customer_address,
            $CaseModel->customer_no,
            $CaseModel->inspection_address,
            $CaseModel->vehicle_no,
            $CaseModel->chassis_no,
            $CaseModel->engine_no,
            $CaseModel->odo_meter,
            $CaseModel->rc_verified,
            $CaseModel->vehicle_cat->vehicle_type,
            $CaseModel->manufacturers->manufacturer_name,
            $CaseModel->year,
            $CaseModel->vehicle_variant,
            $CaseModel->fuel_used,
            $CaseModel->vehicle_colour,
            $CaseModel->casetypes->case_type,
            $CaseModel->engine_started,
            $CaseModel->remarks,
            $CaseModel->ins_status->inspection_status,
            $CaseModel->paymnet->payment_mode,
            $CaseModel->conveyance,
            $CaseModel->from,
            $CaseModel->to,
            $CaseModel->qcid->name,
            $CaseModel->inspection_date,
            $CaseModel->created_at,
            $CaseModel->updated_at,

        ] ;
}
public function headings(): array
{
    return [
     'id',
    'company_name',
    'company_branch',
    'insurance_ref',
    'req_no',
    'req_name',
    'req_code',
    'req_email',
    'customer_name',
    'customer_address',
    'customer_no',
    'inspection_address',
    'vehicle_no',
    'chassis_no',
    'engine_no',
    'odo_meter',
    'rc_verified',
    'vehicle_category',
    'vehicle_manufacturer',
    'year',
    'vehicle_variant',
    'fuel_used',
    'vehicle_colour',
    'case_type',
    'engine_started',
    'remarks',
    'inspection_status',
    'payment_mode',
    'conveyance',
    'from',
    'to',
    'qc_id',
    'case_by',
    'inspection_date',
    'created_at',
    'updated_at',
    ];
}
}