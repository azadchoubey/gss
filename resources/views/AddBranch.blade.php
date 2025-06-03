@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
            <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">{{"Add Branch"}}</div>
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
                    <form action='{{url("/branch")}}' method='POST'>
                        @csrf
                        <table class="table table-borderless">
                            <tr>
                                <td> Select Company </td>
                                <td><select name="company" class="form-control">
                                <option value="">Select Company</option>
                                @foreach($companyies as $company)
                                <option value="{{$company->id}}">{{$company->Company_name}}</option>
                                @endforeach    
                                </select></td>
                            </tr>
                            <tr>
                                <td> Branch Name </td>
                                <td><input type="text" class="form-control" name="branch"/></td>
                            </tr>
                            <tr>
                                <td><input type=submit value='Add Branch' class="btn btn-dark">
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