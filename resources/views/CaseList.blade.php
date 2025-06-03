@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-2">
    <div class="col-md-9 col-md-push-1" id="search">
      <div class="container">
        <h3 class="text-center mt-2">Search Case</h3>
        <div class="row mt-4">
          <form action="{{url('/search')}}" method="post" id="searchForm" class="input-group">
            @csrf
            <div class="col-12">
              <div class="input-group-btn search-panel mb-2">
                <select name="vtype" id="search_param" class="form-control text-center">
                  <option value="">All Vehicle</option>
                  @foreach($vehiles as $vehicle)
                  <option value="{{ $vehicle->id }}" {{ ($resquest['vtype'] == $vehicle->id) ? 'selected' : '' }}> {{$vehicle->vehicle_type}}</option>
                  @endforeach
                </select>
              </div>

              <!-- end form -->
            </div>
            <div class="col-12 col-xs-offset-2">
              <input type="text" class="form-control text-center mb-4" name="search" value="{{ $resquest['search']!= '' ? $resquest['search']:'' }}" placeholder="Search">
              <table>
                <tr>
                  <td><input type='radio' name='in' {{$resquest['in'] == "id"  ? 'checked':'' }} value='id' checked> Case ID</td>
                </tr>
                <tr>
                  <td><input type='radio' name='in' {{$resquest['in'] == "vnumber"  ? 'checked':'' }} value='vnumber'> Vehicle Number</td>
                </tr>
                <tr>
                  <td><input type='radio' name='in' {{$resquest['in'] == "cnumber"  ? 'checked':'' }} value='cnumber'> Chassis Number </td>
                </tr>
                <tr>
                  <td><input type='radio' name='in' {{$resquest['in'] == "icreferenceno"  ? 'checked':'' }} value='icreferenceno'> Insurance Company Ref </td>
                </tr>
              </table>

              <div class="text-center mt-3">
                <button class="btn btn-dark mt-3 mb-4" type="submit">
                  Search
                </button>
              </div>
            </div>
          </form><!-- end col-xs-8 -->
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end col-md-9 -->
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
                  <td><select name="company" class="form-control" id="company" onchange="changecompanyandbranch(this.value)">
                      @foreach($companyies as $company)
                      <option id="short_name" value="{{$company->id}}">{{$company->Company_name}}</option>
                      @endforeach
                    </select></td>
                </tr>
                <tr>
                  <td> Branch Name </td>
                  <td><select name="branch" id="branch" class="form-control">
                      <option id="name" value=""></option>
                    </select></td>
                </tr>
                <tr>
                  <td><input type=submit value='Edit' id="edit" class="btn btn-dark">
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
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header text-white" style="background-color:rgba(0, 0, 0, 0.684);">
            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Branch</h5>
            <button type="button" class="btn-close" style="background-color:white;" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action='' method='POST' id="form_id1">
              @csrf
              <input type="hidden" name="_method" value="PUT">
              <table class="table table-borderless">
                <tr>
                  <td>Vehicle Type </td>
                  <td><select name="vehicletype" id="vcat" class="form-control" onchange="changevehicletype(this.value)">
                      @foreach($vehicletypes as $vehicletype)
                      <option id="name" value="{{$vehicletype->id}}">{{$vehicletype->vehicle_type}}</option>
                      @endforeach
                    </select></td>
                </tr>
                <tr>
                  <td> Manufacturer Name</td>
                  <td><select name="mname" id="vmanu" class="form-control">
                      <option id="" value=""></option>
                    </select></td>

                </tr>
                <tr>
                  <td><input type=submit value='Edit' id="edit" class="btn btn-dark">
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
  @if(count($cases) > 0)
  <div class="col-lg-10" id="case">
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    @foreach ($cases as $case)
    <div class="list-group border border-info mb-3">
      <div class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-sm-flex w-100 justify-content-between text-light p-2 nav-dark">
          <a style="color:aliceblue;" class="text-center" href="{{route('qcpage',['id'=>encrypt($case->id)])}}">
            @if($case->vehicle_category=="1")
            <img src="{{asset('/img/bike.png')}}" style="width: 50px;">
            @endif
            @if($case->vehicle_category=="2")
            <img src="{{asset('/img/car.png')}}" style="width: 50px;">
            @endif
            @if($case->vehicle_category=="3")
            <img src="{{asset('/img/truck.png')}}" style="width: 50px;">
            @endif
            <h5 class="mb-1"> {{$case->id}} </h5>
          </a>
          <p> {{'Company : '.$case->companies->Company_name}}</p>
          <p> {{'Inspect By : '.$case->fo->name}}</p>
          <small>{{date('D-m-Y h:i:A', strtotime($case->created_at))}}</small>
          @if($case->pdfstatus == 1)
            <p> Qc : Done</p>
          @else
            <p> Qc : Pending</p>
          @endif
       

        </div>
        <table class="table table-borderless ">
          <thead>
            <th>Customer Name </th>
            <th> Customer Address </th>
            <th> Mobile</th>
            <th> Vehicle No. </th>
            <th> Options </th>
          </thead>
          <tr>
            <td>{{$case->customer_name}}</td>
            <td>{{$case->customer_address}}</td>
            <td>{{$case->customer_no}}</td>
            <td>{{$case->vehicle_no}}</td>
            <td>
              <div class="dropdown">
                <div id="dropdownMenu2" data-toggle="dropdown">
                  &#8942;
                </div>
                <div class="dropdown-menu p-1" aria-labelledby="dropdownMenu2">
                  @if($case->qc_id!=null && $case->pdfstatus==1)
                  @if(auth()->user()->role_id =='1')
                  <a href="{{url('/reopen/'.encrypt($case->id))}}" style="text-decoration: none;"><button class="dropdown-item" type="button">Reopen Case</button></a>
                  @endif
                  <a href="{{route('downloadreport',['id'=>$case->id,'download'=>$case->images])}}" style="text-decoration: none;"><button class="dropdown-item" type="button">Download Report</button>
                    <a href="{{ route('downloadpics',['download'=>encrypt($case->images)]) }}" style="text-decoration: none;"><button class="dropdown-item" type="button">Download Pics</button></a>
                    @endif
                    @if($case->pdfstatus==0)
                    <a href="{{route('qcpage',['id'=>encrypt($case->id)])}}" style="text-decoration: none;"><button class="dropdown-item" type="button">Qc Page</button>
                      @if($case->imgstatus!=0)
                      <a href="{{ route('downloadpics',['download'=>encrypt($case->images)]) }}" style="text-decoration: none;"><button class="dropdown-item" type="button">Download Pics</button></a>
                      @endif
                      @if(auth()->user()->role_id =='1')
                      <a href="javascript:void(0);" onclick="changecompanyandbranch('{{  $case->id}}')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Change Company & Branch</a>
                      <a href="javascript:void(0);" onclick="changevehicletype('{{  $case->id}}')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalToggle2">Change Vehicle Type</a>
                      @endif
                      @endif
                </div>
              </div>
            </td>
          </tr>

        </table>


      </div>

    </div>
    @endforeach
    <div class="d-flex justify-content-center">
      {!! $cases->links() !!}
    </div>
  </div>
  @endif
</div>


@endsection