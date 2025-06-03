@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
            <div class="card">
                <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">{{"Create New Case"}}</div>
                <div class="card-body">
                @if (session('status')) 
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                <form action='{{url("/createcase")}}' method='POST' enctype="multipart/form-data">
                    @csrf
                        <table class="table table-borderless">
                            <tr>
                                <td>Company Name </td>
                                <td><select name="company"  id="company" class="form-control">
                                <option value="">Select Company</option>
                                @foreach($companyies as $company)
                                <option value="{{ $company->id}}">{{$company->Company_name }}</option>
                                @endforeach
                                </select></td>
                            </tr>
                            <tr>
                                <td>  Company Branch</td>
                                <td><select name="branch" id="branch" class="form-control">
                                </select></td>
                            </tr>
                            <tr>
                                <td>  Insurance Company Ref No </td>
                                <td><input type="text" class="form-control" name="iref"/></td>
                            </tr>
                            <tr>
                                <td>  Customer Name </td>
                                <td><input type="text" class="form-control" name="cname"/></td>
                            </tr>
                            <tr>
                                <td> Vehicle Number  </td>
                                <td><input type="text" class="form-control" name="vnum" style="text-transform: uppercase"/></td>
                            </tr>
                            <tr>
                                <td>  Vehicle Category  </td>
                                <td><select name="vcat" id="vcat" class="form-control">
                                <option value="">Select Company</option>
                                @foreach($vehicletypes as $vehicletype)
                                <option value="{{ $vehicletype->id }}">{{$vehicletype->vehicle_type }}</option>
                                @endforeach 
                                </select></td>
                            </tr>
                            <tr>
                                <td>Vehicle Manufacturer</td>
                                <td><select name="vmanu" id="vmanu" class="form-control">
                                <option value="">Select Company</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Vehicle Variant </td>
                                <td><input type="text" class="form-control" name="vv"/></td>
                            </tr>
                            <tr>
                                <td>Upload Images </td>
                                <td><input type="file" class="form-control" multiple name="file[]" accept="image/*" /></td>
                            </tr>
                            <tr>
                                <td>Date Time</td>
                                <td><input type="datetime-local" value="" id="datefield"  class="form-control" name="date" /></td>
                            </tr>
                            <tr>
                                <td> Fild Officer</td>
                                <td><select name="fo" id="fo" class="form-control">
                                <option value="">Select Fo</option>
                                @foreach($fos as $fo)
                                <option value="{{ $fo->id }}">{{$fo->name }}</option>
                                @endforeach 
                                </select></td>
                            </tr>
                            @if(Auth::user()->role_id == 1)
                            <tr>
                                <td> Ro </td>
                                <td><select name="ro" id="ro" class="form-control">
                                <option value="">Select Ro</option>
                                @foreach($ros as $ro)
                                <option value="{{ $ro->id }}">{{$ro->name }}</option>
                                @endforeach 
                                </select></td>
                            </tr>
                            @endif
                            <tr>
                                <td><input type=submit value='Create Case' class="btn btn-dark">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection