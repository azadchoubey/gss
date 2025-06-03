@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
            <div class="card">
            <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">{{"Create Fild Officer"}}</div>
                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                <form action='{{url("/fo")}}' method='POST'>
                    @csrf
                        <table class="table table-borderless">
                            <tr>
                                <td>  Name </td>
                                <td><input type="text" class="form-control" name="uname"/></td>
                            </tr>
                            <tr>
                                <td> Mobile No  </td>
                                <td><input type="text" class="form-control" name="mobile"/></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" class="form-control" name="email"/></td>
                            </tr>
                            <tr>
                                <td><input type=submit value='Register User' class="btn btn-dark">
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