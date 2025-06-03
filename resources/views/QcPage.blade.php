@extends('layouts.app')

@section('content')
<form id="myform" action="{{url('/markqc/'.encrypt($cases->id))}}" method="post">
    <div class="row p-3">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">Case ID : {{$cases->id}} <a style="float:right; color:white;" class="btn btn-success" href="{{ route('downloadpics',['download'=>encrypt($cases->images)]) }}"><i class="bi bi-download"></i>Download Case Pics</a></div>
                <div class="card-body">
                    <table class="table table-borderless" cellspacing="0" cellpadding="0">

                        <tr>
                            <td>@csrf</td>
                        </tr>
                        <tr>
                            <td>Company Name</td>
                            <td>{{$cases->companies->Company_name}}</td>
                        </tr>
                        <tr>
                            <td>Company Branch</td>
                            <td>
                                {{$cases->c_branch->branch_name}}
                            </td>
                        </tr>
                        <tr>
                            <td> Insurance Company Ref No </td>
                            <td><input id="icreferenceno" type="text" value="{{$cases->insurance_ref}}" name="icreferenceno" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td> * Requester Contact No </td>
                            <td><input id="rcontact" type="text" value="{{$cases->req_no}}" name="rcontact" required class="form-control" /> </td>
                        </tr>
                        <tr>
                            <td> * Requester Name </td>
                            <td><input id="rname" type="text" value="{{$cases->req_name}}" name="rname" required class="form-control" /> </td>
                        </tr>
                        <tr>
                            <td>Requester Code/R.No </td>
                            <td><input id="rcode" type="text" value="{{$cases->req_code}}" name="rcode" class="form-control" /> </td>
                        </tr>
                        <tr>
                            <td>Requester Email </td>
                            <td><input id="remail" type="email" value="{{$cases->req_email}}" name="remail" class="form-control" /> </td>
                        </tr>
                        <tr>
                            <td> * Customer Name </td>
                            <td><input id="cname" type="text" value="{{$cases->customer_name}}" name="cname" required class="form-control" /> </td>
                        </tr>
                        <tr>
                            <td> * Customer Address </td>
                            <td><textarea id="caddress" name="caddress" required class="form-control">{{$cases->customer_address}}</textarea> </td>
                        </tr>
                        <tr>
                            <td> * Inspection Address</td>
                            <td><textarea id="inspectionaddress" name="inspectionaddress" required class="form-control">{{$cases->inspection_address}}</textarea>
                        </tr>
                        <tr>
                            <td> * Customer Contact Number </td>
                            <td><input id="ccontact" type="text" value="{{$cases->customer_no}}" name="ccontact" required class="form-control" pattern="[6-9]{1}[0-9]{9}" 
       title="Phone number with 6-9 and remaing 9 digit with 0-9"/> </td>
                        </tr>
                        <tr>
                            <td>Vehicle Number </td>
                            <td><input id="vnumber" type="text" value="{{$cases->vehicle_no}}" name="vnumber" required class="form-control" style="text-transform: uppercase" /> </td>
                        </tr>
                        <tr>
                            <td>Chassis Number </td>
                            <td><input id="cnumber" type="text" value="{{$cases->chassis_no}}" name="cnumber" class="form-control" /> </td>
                        </tr>
                        <tr>
                            <td>Engine Number </td>
                            <td><input id="enumber" type="text" value="{{$cases->engine_no}}" name="enumber" class="form-control" /> </td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Odo Meter </td>
                            <td><input id="odometer" type="text" value="{{$cases->odo_meter}}" name="odometer" class="form-control" required> </td>
                        </tr>

                        <tr>
                            <td>RC Verified</td>
                            <td><select class="form-control" name="rcverified" required>
                                    <option value="" >Select Option</option>
                                    <option value='1' {{ ($cases->rc_verified == 1) ? 'selected' : '' }}>Yes</option>
                                    <option value='0' {{ ($cases->rc_verified == 0) ? 'selected' : '' }}>No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> * Vehicle Manufacturer : </td>
                            <td>
                                <select class="form-control" name="vmfgid" id="vmfgid" required>
                                    @foreach($cases->vehicle_cat->manufacturer as $manufacturer)
                                    <option value="{{ $manufacturer->id }}" {{ ($cases->vehicle_manufacturer == $manufacturer->id) ? 'selected' : '' }}> {{$manufacturer->manufacturer_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> * Vehicle Model / Year of Manufacture </td>
                            <td><input id="vmodel" class="form-control" maxlength="4" size="4" min="1900" max="2022" type="number" value="{{$cases->year}}" name="vmodel" required /> </td>
                        </tr>
                        <tr>
                            <td>Vehicle Variant </td>
                            <td><input id="vvariant" class="form-control" type="text" value="{{$cases->vehicle_variant}}" name="vvariant" required /> </td>
                        </tr>
                        <!-- new fields start -->
                        <tr>
                            <td> Fuel Used </td>
                            <td> <select class="form-control" name="fuelused" required>
                                    <option value="">Select Option</option>
                                    @foreach($Fuels as $Fuel)
                                    <option value="{{  $Fuel->id }}" {{ ($cases->fuel_used == $Fuel->id) ? 'selected' : '' }}> {{ $Fuel->fuel_type}}</option>
                                    @endforeach
                                </select> </td>
                        </tr>

                        <tr>
                            <td> Vehicle Colour </td>
                            <td><input id="vcolor" class="form-control" type="text" value="{{$cases->vehicle_colour}}" name="vcolor" required /></td>
                        </tr>

                        <tr>
                            <td> Engine Started </td>
                            <td> <select class="form-control" name="enginestarted" required>
                                    <option value="">Select Option</option>
                                    <option value='1' {{ ($cases->engine_started == 1) ? 'selected' : '' }}>Yes</option>
                                    <option value='0' {{ ($cases->engine_started == 0) ? 'selected' : '' }}>No</option>
                                </select> </td>
                        </tr>
                        <!-- <tr>
                            <td> * Case Type </td>
                            <td> <SELECT name='ctype' class="form-control" id="ctype" onchange="ctypechanged(this.value)">
                                    @foreach($Casetypes as $Casetype)
                                    <option value="{{  $Casetype->id }}"> {{ $Casetype->case_type}}</option>
                                    @endforeach
                                </SELECT> </td>
                        </tr> -->
                        <tr>
                            <td> * Remarks </td>
                            <td><textarea id="remarks" class="form-control" name="remarks" required>{{$cases->remarks}}</textarea> </td>
                        </tr>

                        <!-- new fields start -->
                        <tr>
                            <td>Inspection Status </td>
                            <td> <select class="form-control" name="inspectionstatus" required>
                                    <option value="">Select Status</option>
                                    @foreach($InspectionStatuss as $InspectionStatus)
                                    <option value="{{  $InspectionStatus->id }}" {{ ($cases->inspection_status ==  $InspectionStatus->id ) ? 'selected' : '' }}> {{ $InspectionStatus->inspection_status}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> Payment Mode </td>
                            <td> <SELECT name='paymentmode' class="form-control">
                                    @foreach($Paymentmodes as $Paymentmode)
                                    <option value="{{  $Paymentmode->id }}" {{ ($cases->payment_mode == $Paymentmode->id ) ? 'selected' : '' }}> {{ $Paymentmode->payment_mode}}</option>
                                    @endforeach
                                </SELECT> </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card mt-2" id="valuation" style="display:none;">
                <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">Add Valuation Details</div>
                <div class="card-body">
                    <tr>
                        <td colspan="2" id="valuationsec">
                            <table class="table table-borderless" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td> Valuation Case Type </td>
                                        <td>
                                            <select name="v_vtype" class="form-control" disabled>
                                                @foreach($valuationtypes as $valuationtype)
                                                <option value="{{  $valuationtype->id }}"> {{ $valuationtype->valuation_type}}</option>
                                                @endforeach

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Transmission </td>
                                        <td>
                                            <select name="v_transmission" class="form-control" disabled>


                                                <option value='Manual'>Manual</option>
                                                <option value='Automatic'>Automatic</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Ownership </td>
                                        <td>
                                            <select name="v_ownership" class="form-control" disabled>

                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>



                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> RC Status </td>
                                        <td>
                                            <select name="v_rcstatus" class="form-control" disabled>
                                                <option value=""> Select RC Status </option>

                                                @foreach($Rcstatuss as $Rcstatus)
                                                <option value="{{  $Rcstatus->id }}"> {{ $Rcstatus->rc_status}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Insurance Policy </td>
                                        <td>
                                            <select name="v_insurancepolicy" class="form-control" disabled>
                                                @foreach($Policytypes as $Policytype)
                                                <option value="{{  $Policytype->id }}"> {{ $Policytype->policy_type}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Insurance Validity </td>
                                        <td> <input type="date" name="v_insurancevalidity" value="" class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td> Body Condition </td>
                                        <td>
                                            <select name="v_bodycondition" class="form-control" disabled>
                                                @foreach($Bodyconditions as $Bodycondition)
                                                <option value="{{  $Bodycondition->id }}"> {{ $Bodycondition->bodycondition}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Rate Vehicle </td>
                                        <td>
                                            <select name="v_rating" class="form-control" disabled>

                                                <option value='10'>10</option>
                                                <option value='9'>9</option>
                                                <option value='8'>8</option>
                                                <option value='7'>7</option>
                                                <option value='6'>6</option>
                                                <option value='5'>5</option>
                                                <option value='4'>4</option>
                                                <option value='3'>3</option>

                                            </select> Excellent(10,9), Good(8,7), Average(6,5), Bad(4,3)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> HPA </td>
                                        <td>
                                            <select name="v_hpa" class="form-control" disabled>

                                                <option value='YES'>YES</option>
                                                <option value='NO'>NO</option>
                                                <option value='NA'>NA</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> HPA Bank </td>
                                        <td> <input type="text" name="v_hpabank" value="" class="form-control" disabled> </td>
                                    </tr>
                                    <tr>
                                        <td> Loan Number </td>
                                        <td><input type="text" name="v_loannumber" class="form-control" value="" disabled></td>
                                    </tr>
                                    <tr>
                                        <td> Valuation Price </td>
                                        <td><input type="text" name="v_valuationprice" class="form-control" value="" disabled></td>
                                    </tr>
                                    <tr>
                                        <td> Valuation Remarks </td>
                                        <td>
                                            <textarea class="form-control" name="v_valuationremarks" disabled>
         </textarea>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </div>
            </div>
@php 
$value =[];
foreach ($cases->demagess as $d){
    $value  []=$d->dem['id'];
   
}
     @endphp   </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">Vehicle Damages</div>
                <div class="card-body">
                    <table class="table table-borderless" cellspacing="0" cellpadding="0">
                        @foreach ($cases->vehicle_cat->parts as $parts)
                        <tr>
                            <td>{{$parts->parts_name}}</td>

                            <td>
                                @if(count($value) > 0)
                                <select class="form-control" name="vehcile[{{str_replace(' ', '', $parts->parts_name)}}]">
                                    @for($j=0;count($parts->vdamage)>$j;$j++)
                                    @for($k=0;count($value)>$k;$k++)
                                    @if($value[$k]==$parts->vdamage[$j]->id)
                                    <option value="{{$parts->vdamage[$j]->id}}" selected>{{$parts->vdamage[$j]->vehicle_damages}}</option>
                                    @endif
                                    @endfor
                                    <option value="{{$parts->vdamage[$j]->id}}">{{$parts->vdamage[$j]->vehicle_damages}}</option>
                                    @endfor
                                </select>
                                @else
                                <select class="form-control" name="vehcile[{{str_replace(' ', '', $parts->parts_name)}}]">
                                    @foreach ($parts->vdamage as $vdamage)
                                    <option value="{{$vdamage->id}}">{{$vdamage->vehicle_damages}}</option>
                                    @endforeach

                                </select>
                                @endif
                               
                                
                            </td>

                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <tr>
                <td>
                    <div class="text-center">
                        <input type='submit' onclick="check()" name="qcdone" value="Mark QC Pass" class="dark mt-3" style="width:65%;" />
                    </div>
                </td>
            </tr>
        </div>

    </div>
</form>

@endsection