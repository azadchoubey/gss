@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
            <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">{{"Add Manufacturer"}}</div>
                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action='{{url("/manufacturer")}}' method='POST'>
                        @csrf
                        <table class="table table-borderless">
                            <tr>
                                <td> Vehicle Type </td>
                                <td><select name="vehicletype" class="form-control">
                                <option value="">Select Vehicle Type</option>
                                @foreach($vehicletypes as $vehicletype)
                                <option value="{{$vehicletype->id}}">{{$vehicletype->vehicle_type}}</option>
                                @endforeach  
                                </select></td>
                            </tr>
                            <tr>
                                <td> Manufacturer Name </td>
                                <td><input type="text" class="form-control" name="manufacturer"/></td>
                            </tr>
                            <tr>
                                <td><input type=submit value='Add Manufacturer' class="btn btn-dark">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
@endsection