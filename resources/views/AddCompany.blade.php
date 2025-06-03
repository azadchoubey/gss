@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
            <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">{{"Add Company"}}</div>
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
                    <form action='{{url("/company")}}' method='POST'>
                        @csrf
                        <table class="table table-borderless">
                            <tr>
                                <td> Company Name </td>
                                <td><input id="name" type="text" name="cname" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td> Company Short Name </td>
                                <td><input id="short_name" type="text" name="cshort" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td><input type=submit value='Add Company' class="btn btn-dark">
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