@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
            <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">{{"Edit Company"}}</div>
                <div class="card-body">
                    <form action='' method='POST'>
                        <table class="table table-borderless">
                            <thead>
                                <th> Company Name </th>
                                <th> Short Name </th>
                                <th> Action </th>
                                <thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        </table>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
@endsection