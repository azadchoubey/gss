@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
            <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">{{"Edit Branch"}}</div>
                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action='' method='POST'>
                        <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" id="table">
                            <thead>
                                <th> Company Name </th>
                                <th> Branch Name </th>
                                <th> Action </th>
                                <thead>
                            <tbody>
                            @foreach($branches as $branch)
                                <tr>
                                    <td>{{ $branch->company->Company_name}}</td>
                                    <td>{{$branch->branch_name}}</td>
                                    <td><a href="javascript:void(0);" onclick="editbranch('{{  $branch->id}}')" class="p-1" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Edit</a>
                                </tr>
                                @endforeach
                        </tbody>
                        </table>
                    </form>
                </div>


            </div>
        </div>
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Edit Branch</h5>
                        <button type="button" class="btn-close" style="background-color:white;" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action='' method='POST' id="form_id">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <table class="table table-borderless">
                                <tr>
                                    <td> Company Name </td>
                                    <td><select name="company" class="form-control">
                                @foreach($companyies as $company)
                                <option id="name" value="{{$company->id}}">{{$company->Company_name}}</option>
                                @endforeach    
                                </select></td>
                                </tr>
                                <tr>
                                    <td> Branch Name </td>
                                    <td><input id="short_name" type="text" name="cshort" class="form-control" required /></td>
                                </tr>
                                <tr>
                                    <td><input type=submit value='Edit Branch'  id ="edit" class="btn btn-dark">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">
                        <button class="btn btn-dark">Open second modal</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection