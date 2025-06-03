@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
            <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">{{"Edit User"}}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action='' method='POST'>
                        <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" id="table">
                            <thead>
                                <th> User Name</th>
                                <th> Email </th>
                                <th> Role </th>
                                <th> Action </th>
                                <thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role->role_name}}</td>
                                        <td><a href="javascript:void(0);" onclick="edituser('{{ $user->id}}')" class="p-1" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Edit</a>
                                        <a href="{{url('deactiveuser').'/'.$user->id}}"  class="p-1">Deactivate</a>
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
                        <h5 class="modal-title" id="exampleModalToggleLabel">Edit User</h5>
                        <button type="button" class="btn-close" style="background-color:white;" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action='' method='POST' id="form_id">
                            @csrf
                            <table class="table table-borderless">

                                <tr>
                                    <td> User Name </td>
                                    <td><input id="short_name" type="text" name="uname" class="form-control" required /></td>
                                </tr>
                                <tr>
                                    <td> Email Id </td>
                                    <td><input id="email" type="text" name="email" class="form-control" required /></td>
                                </tr>
                                <tr>
                                    <td> Role</td>
                                    <td><select name="role" class="form-control">
                                            @foreach($roles as $role)
                                            <option id="name" value="{{$role->id}}">{{$role->role_name}}</option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type=submit value='Edit User' id="edit" class="btn btn-dark">
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