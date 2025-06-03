@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    @if(Auth::user()->role_id == 1)
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">Search by RO</div>
        <div class="card-body">
          <FORM name=form4 ACTION='{{url("/misdownload")}}' METHOD="POST">
            @csrf
            <table>
              <tr>
                <td>
                  <SELECT size='5' class='form-control' name="ro_user_id[]" multiple>
                    @foreach($ros as $ro)
                    <OPTION value='{{$ro->id}}'> {{$ro->name}} </OPTION>
                    @endforeach
                </td>
              </tr>
              <tr>
                <td> Start Date : <input type='date' class='form-control' required name='startdate' value='' /> </td>
                <td> End Date : <input type='date' class='form-control' required name='enddate' value='' />
                </td>
              </tr>
              <tr>
                <td><input type=submit class='btn btn-dark mt-2' value='Search'></td>
              </tr>
            </table>
          </FORM>
        </div>
      </div>
    </div>
    @endif
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">Search by Company</div>
        <div class="card-body">
          <FORM ACTION='{{url("/misdownload")}}' METHOD="Post">
            @csrf
            <table>
              <tr>
                <td> <SELECT class='form-control' size='5' name="i_c[]" multiple>
                    @foreach($companyies as $company)
                    <OPTION value='{{$company->id}}'> {{$company->Company_name}} </OPTION>
                    @endforeach
                  </SELECT> </td>
              </tr>
              <tr>
                <td> Start Date : <input type='date' class='form-control' required name='startdate' value=''> </td>
                <td> End Date : <input type='date' class='form-control' required name='enddate' value=''> </td>
              <tr>
              <tr>
                <td colspan=2><input type=submit class='btn btn-dark mt-2' value='Search'></td>
              </tr>
            </table>
          </FORM>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">Search by Date</div>
        <div class="card-body">
          <FORM name=form3 ACTION='{{url("/misdownload")}}' METHOD=POST>
            @csrf
            <table>
              <tr>
                <td> Start Date : <input type='date' class='form-control' required name='startdate' value=''> </td>
                <td> End Date : <input type='date' class='form-control' required name='enddate' value=''> </td>
              <tr>
              <tr>
                <td colspan=2><input type=submit class='btn btn-dark mt-2' value='Search'></td>
              </tr>
            </table>
          </FORM>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection