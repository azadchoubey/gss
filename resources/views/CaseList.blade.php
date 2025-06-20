@extends('layouts.app-sidebar')
@section('content')

<div class="container-fluid px-0">
  <div class="row mb-4">
    <div class="col-md-12">
      <div class="card gss-card shadow-lg border-0 rounded-3">
        <div class="card-header bg-white">
          <h5 class="mb-0"><i class="fas fa-search me-2"></i>Search Case</h5>
        </div>
        <div class="card-body p-4">
          <form action="{{url('/search')}}" method="post" id="searchForm">
            @csrf
            <div class="row align-items-end">
              <div class="col-md-3 mb-2">
                <label for="search_param" class="form-label small">Vehicle Type</label>
                <select name="vtype" id="search_param" class="form-select form-select shadow-sm">
                  <option value="">All Vehicle</option>
                  @foreach($vehiles as $vehicle)
                  <option value="{{ $vehicle->id }}" {{ ($resquest['vtype'] == $vehicle->id) ? 'selected' : '' }}> {{$vehicle->vehicle_type}}</option>
                  @endforeach
                </select>
              </div>
              
              <div class="col-md-6 mb-2">
                <label for="search" class="form-label small">Search</label>
                <div class="input-group">
                  <input type="text" class="form-control shadow-sm" name="search" value="{{ $resquest['search']!= '' ? $resquest['search']:'' }}" placeholder="Enter Case ID, Vehicle No, Chassis No or Insurance Ref" id="search">
                  <button class="btn btn-gss-primary text-white mr-2" type="submit">
                    <i class="fas fa-search me-1"></i>Search
                  </button>
                </div>
              </div>
            </div>
            
            <div class="mt-3" id="searchOptions">
              <div class="card card-body p-2 border-0">
                <div class="row">
                  <div class="col-md-12">
                    <label class="form-label small mb-2">Search by:</label>
                    <div class="d-flex flex-wrap">
                      <div class="form-check me-3 mb-2">
                        <input class="form-check-input" type="radio" name="in" id="inlineRadio1" {{$resquest['in'] == "id"  ? 'checked':'' }} value="id" checked>
                        <label class="form-check-label" for="inlineRadio1">Case ID</label>
                      </div>
                      <div class="form-check me-3 mb-2">
                        <input class="form-check-input" type="radio" name="in" id="inlineRadio2" {{$resquest['in'] == "vnumber"  ? 'checked':'' }} value="vnumber">
                        <label class="form-check-label" for="inlineRadio2">Vehicle Number</label>
                      </div>
                      <div class="form-check me-3 mb-2">
                        <input class="form-check-input" type="radio" name="in" id="inlineRadio3" {{$resquest['in'] == "cnumber"  ? 'checked':'' }} value="cnumber">
                        <label class="form-check-label" for="inlineRadio3">Chassis Number</label>
                      </div>
                      <div class="form-check me-3 mb-2">
                        <input class="form-check-input" type="radio" name="in" id="inlineRadio4" {{$resquest['in'] == "icreferenceno"  ? 'checked':'' }} value="icreferenceno">
                        <label class="form-check-label" for="inlineRadio4">Insurance Company Ref</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    <!-- Modals -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header text-white" style="background-color:#FC0015;">
            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Company & Branch</h5>
            <button type="button" class="btn-close" style="background-color:white;" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action='' method='POST' id="form_id">
              @csrf
              <input type="hidden" name="_method" value="PUT">
              <div class="mb-3">
                <label class="form-label">Company Name</label>
                <select name="company" class="form-select" id="company" onchange="changecompanyandbranch(this.value)">
                  @foreach($companyies as $company)
                  <option id="short_name" value="{{$company->id}}">{{$company->Company_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Branch Name</label>
                <select name="branch" id="branch" class="form-select shadow-sm">
                  <option id="name" value=""></option>
                </select>
              </div>
              <button type="submit" class="btn btn-gss-primary text-white" id="edit">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header text-white" style="background-color:#FC0015;">
            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Vehicle Type</h5>
            <button type="button" class="btn-close" style="background-color:white;" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action='' method='POST' id="form_id1">
              @csrf
              <input type="hidden" name="_method" value="PUT">
              <div class="mb-3">
                <label class="form-label">Vehicle Type</label>
                <select name="vehicletype" id="vcat" class="form-select shadow-sm" onchange="changevehicletype(this.value)">
                  @foreach($vehicletypes as $vehicletype)
                  <option id="name" value="{{$vehicletype->id}}">{{$vehicletype->vehicle_type}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Manufacturer Name</label>
                <select name="mname" id="vmanu" class="form-select shadow-sm">
                  <option id="" value=""></option>
                </select>
              </div>
              <button type="submit" class="btn btn-gss-primary text-white" id="edit">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Case Information Edit Modal -->
    <!-- Case Information Edit Modal -->
    <div class="modal fade" id="caseEditModal" aria-hidden="true" aria-labelledby="caseEditModalLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header text-white" style="background-color:#FC0015;">
            <h5 class="modal-title" id="caseEditModalLabel"><i class="fas fa-edit me-2"></i>Edit Case Information</h5>
            <button type="button" class="btn-close modal-close-btn" style="background-color:white;" onclick="$('#caseEditModal').modal('hide')"></button>
          </div>
          <div class="modal-body">
            <form enctype="multipart/form-data" id="case_form">
              @csrf
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="case_id" id="case_id">
              
              <!-- Nav tabs for form sections -->
              <ul class="nav nav-tabs nav-fill mb-4" id="editCaseTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active text-danger" id="customer-tab" data-bs-toggle="tab" data-bs-target="#customer" type="button" role="tab" aria-controls="customer" aria-selected="true">
                    <i class="fas fa-user me-2"></i>Customer Information
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link text-primary" id="vehicle-tab" data-bs-toggle="tab" data-bs-target="#vehicle" type="button" role="tab" aria-controls="vehicle" aria-selected="false">
                    <i class="fas fa-car me-2"></i>Vehicle Information
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="company-tab" data-bs-toggle="tab" data-bs-target="#companys" type="button" role="tab" aria-controls="companys" aria-selected="false" style="color: #8540f5;">
                    <i class="fas fa-building me-2"></i>Company Information
                  </button>
                </li>
                <li class="nav-item image-tab-item" role="presentation" style="display:none;">
                  <button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#images" type="button" role="tab" aria-controls="images" aria-selected="false" style="color: #36b9cc;">
                    <i class="fas fa-images me-2"></i>Case Images
                  </button>
                </li>
              </ul>    
              <!-- Tab content -->
              <div class="tab-content" id="editCaseContent">
                <!-- Customer Info Tab -->
                <div class="tab-pane fade show active" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                  <div class="p-3 rounded-3" style="background-color: #fff8f8; border-left: 4px solid #e74a3b;">
                    <h5 class="mb-3 text-danger"><i class="fas fa-user me-2"></i>Customer Information</h5>
                    
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Customer Full Name</label>
                        <input type="text" name="customer_name" id="edit_customer_name" class="form-control shadow-sm" placeholder="e.g. John Smith">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="customer_no" id="edit_customer_no" class="form-control shadow-sm" placeholder="e.g. +91 98765 43210">
                      </div>
                    </div>
                    
                    <div class="mb-3">
                      <label class="form-label">Customer Address</label>
                      <textarea name="customer_address" id="edit_customer_address" class="form-control shadow-sm" rows="3" placeholder="Complete postal address"></textarea>
                    </div>
                  </div>
                </div>
                
                <!-- Vehicle Info Tab -->
                <div class="tab-pane fade" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
                  <div class="p-3 rounded-3 mb-3" style="background-color: #f8f9ff; border-left: 4px solid #4e73df;">
                    <h5 class="mb-3 text-primary"><i class="fas fa-car me-2"></i>Vehicle Details</h5>
                    
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Vehicle Type</label>
                        <select name="vehicle_category" id="edit_vehicle_category" class="form-select shadow-sm">
                          @foreach($vehicletypes as $vehicletype)
                          <option value="{{$vehicletype->id}}">{{$vehicletype->vehicle_type}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Manufacturer</label>
                        <select name="vehicle_manufacturer" id="edit_manufacturer" class="form-select shadow-sm">
                          <!-- Will be populated based on selected vehicle type -->
                        </select>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <label class="form-label">Vehicle Variant/Model</label>
                        <input type="text" name="vehicle_variant" id="edit_vehicle_variant" class="form-control shadow-sm" placeholder="e.g. Swift VXI, Verna SX">
                      </div>
                    </div>
                  </div>
                  
                  <div class="p-3 rounded-3" style="background-color: #fffdf8; border-left: 4px solid #ffc107;">
                    <h5 class="mb-3 text-warning"><i class="fas fa-info-circle me-2"></i>Identification</h5>
                    
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Vehicle Number</label>
                        <input type="text" name="vehicle_no" id="edit_vehicle_no" class="form-control shadow-sm" placeholder="e.g. MH02AB1234">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Chassis Number</label>
                        <input type="text" name="chassis_no" id="edit_chassis_no" class="form-control shadow-sm" placeholder="e.g. MALAN12ABCD34567">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Engine Number</label>
                        <input type="text" name="engine_no" id="edit_engine_no" class="form-control shadow-sm" placeholder="e.g. ABC123456DE">
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Company Info Tab -->
                <div class="tab-pane fade" id="companys" role="tabpanel" aria-labelledby="company-tab">
                  <div class="p-3 rounded-3 mb-3" style="background-color: #fef8ff; border-left: 4px solid #8540f5;">
                    <h5 class="mb-3" style="color: #8540f5;"><i class="fas fa-building me-2"></i>Insurance Company</h5>
                    
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Company Name</label>
                        <select name="company" id="edit_company" class="form-select shadow-sm">
                          @foreach($companyies as $company)
                          <option value="{{$company->id}}">{{$company->Company_name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Branch Location</label>
                        <select name="branch" id="edit_branch" class="form-select shadow-sm">
                          <!-- Will be populated based on selected company -->
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="p-3 rounded-3" style="background-color: #f8fffa; border-left: 4px solid #28a745;">
                    <h5 class="mb-3 text-success"><i class="fas fa-file-alt me-2"></i>Insurance Details</h5>
                    
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Insurance Reference No.</label>
                        <input type="text" name="icreferenceno" id="edit_icreferenceno" class="form-control shadow-sm" placeholder="e.g. INS/2025/12345">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Inspection Date & Time</label>
                        <input type="datetime-local" name="inspection_date" id="edit_inspection_date" class="form-control shadow-sm">
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Images Tab (shown only when imgstatus == 1) -->
                <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                  <div class="p-3 rounded-3 mb-3" style="background-color: #f2f9ff; border-left: 4px solid #36b9cc;">
                    <h5 class="mb-3" style="color: #36b9cc;"><i class="fas fa-camera me-2"></i>Upload New Images</h5>
                    
                    <div class="mb-3">
                      <input type="file" name="case_images[]" id="edit_case_images" class="form-control shadow-sm" multiple accept="image/*">
                      <div class="text-muted mt-1 small">You can select multiple images at once</div>
                    </div>
                  </div>
                  
                  <div class="p-3 rounded-3" style="background-color: #f8f9fa; border-left: 4px solid #5a5c69;">
                    <h5 class="mb-3 text-secondary"><i class="fas fa-images me-2"></i>Existing Images</h5>
                    <div class="small text-muted mb-3">
                      <i class="fas fa-info-circle me-1"></i>
                      Click the <i class="fas fa-times text-danger"></i> button on any image to mark it for removal. Changes will be saved when you click "Update Case".
                    </div>
                    
                    <div id="existing_images" class="row g-2 mt-3">
                      <!-- Existing images will be loaded here -->
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="mt-4 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary modal-close-btn" onclick="$('#caseEditModal').modal('hide')">Cancel</button>
                <button type="button" class="btn btn-gss-primary text-white" id="updateCaseBtn">Update Case</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  <!-- Display Cases -->
  @if(count($cases) > 0)
  <div class="row">
    @if (session('status'))
    <div class="col-12 mb-4">
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    </div>
    @endif
    
    <div class="col-12">
      @foreach ($cases as $case)
      <div class="card gss-card case-card shadow-sm border-0 rounded-3 mb-3">
        <div class="card-body p-0">
          <div class="row g-0">
            <!-- Left side with image and case ID -->
            <div class="col-md-2 border-end bg-light p-3 d-flex flex-column justify-content-center align-items-center">
              <div class="text-center mb-3">
                @if($case->vehicle_category=="1")
                <img src="{{asset('/img/bike.png')}}" style="width: 40px;">
                @endif
                @if($case->vehicle_category=="2")
                <img src="{{asset('/img/car.png')}}" style="width: 40px;">
                @endif
                @if($case->vehicle_category=="3")
                <img src="{{asset('/img/truck.png')}}" style="width: 40px;">
                @endif
              </div>
              <div class="text-center">
                <div class="vehicle-info fw-bold">Case: {{ $case->id }}</div>
                <div class="small text-muted">{{ $case->vehicle_no }}</div>
              </div>
              
              <div class="mt-3 text-center">
                @if($case->pdfstatus == 1)
                <span class="badge badge-gss-success rounded-pill">
                  <i class="fas fa-check-circle me-1"></i> QC Done
                </span>
                @else
                <span class="badge badge-gss-warning rounded-pill">
                  <i class="fas fa-clock me-1"></i> QC Pending
                </span>
                @endif
              </div>
            </div>
            
            <!-- Middle section with customer info -->
            <div class="col-md-8 p-3">
              <div class="row h-100">
                <div class="col-md-7">
                  <h5 class="fw-bold mb-2">{{ $case->customer_name }}</h5>
                  
                  <div class="d-flex align-items-center mb-2">
                    <div class="me-2 text-center" style="width: 28px; height: 28px; background-color: #f5f9ff; border-radius: 50%; line-height: 28px; font-size: 0.8rem;">
                      <i class="fas fa-map-marker-alt text-muted"></i>
                    </div>
                    <div style="flex: 1;" class="overflow-hidden">
                      <a href="https://maps.google.com/?q={{ urlencode($case->customer_address) }}" target="_blank" class="text-decoration-none" title="Open in Google Maps">
                        <div class="text-truncate" title="{{ $case->customer_address }}">{{ $case->customer_address }} <i class="fas fa-external-link-alt ms-1" style="font-size: 0.7rem; color: var(--gss-primary);"></i></div>
                      </a>
                    </div>
                  </div>
                  
                  <div class="d-flex align-items-center mb-2">
                    <div class="me-2 text-center" style="width: 28px; height: 28px; background-color: #f5f9ff; border-radius: 50%; line-height: 28px; font-size: 0.8rem;">
                      <i class="fas fa-phone text-muted"></i>
                    </div>
                    <div>
                    
                      <div class="small"> {{ $case->customer_no }}</div>
                    </div>
                  </div>
                  
                  <div class="d-flex align-items-center">
                    <div class="me-2 text-center" style="width: 28px; height: 28px; background-color: #f5f9ff; border-radius: 50%; line-height: 28px; font-size: 0.8rem;">
                      <i class="fas fa-building text-muted"></i>
                    </div>
                    <div class="text-truncate" title="{{ $case->companies->Company_name }}">{{ $case->companies->Company_name }}</div>
                  </div>
                </div>
                
                <div class="col-md-5">
                  <div class="p-2 rounded h-100">
                    <div class="d-flex align-items-center mb-2">
                      <div class="me-2 text-center" style="width: 28px; height: 28px; background-color: white; border-radius: 50%; line-height: 28px; font-size: 0.8rem;">
                        <i class="fas fa-user text-muted"></i>
                      </div>
                      <div class="text-truncate">
                        <div class="small text-muted">FO:</div>
                        <div title="{{ $case->fo->name }}">{{ $case->fo->name }}</div>
                      </div>
                    </div>
                  <div class="d-flex align-items-center">
                            <div class="me-2 text-center" style="width: 28px; height: 28px; background-color: white; border-radius: 50%; line-height: 28px; font-size: 0.8rem;">
                        <i class="fas fa-calendar-alt text-muted"></i>
                      </div>
                        <div>
                        <div class="small text-muted">Inspection Date:</div>
                        <div>{{ date('d-m-Y h:i A', strtotime($case->inspection_date)) }}</div>
                      </div>
                    </div>     
                    <div class="d-flex align-items-center mt-2">
                      <div class="me-2 text-center" style="width: 28px; height: 28px; background-color: white; border-radius: 50%; line-height: 28px; font-size: 0.8rem;">
                        <i class="fas fa-calendar-alt text-muted"></i>
                      </div>
                      <div>
                        <div class="small text-muted">Created Date:</div>
                        <div>{{ date('d-m-Y h:i A', strtotime($case->created_at)) }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Right section with actions -->
            <div class="col-md-2 p-3 border-start">
              <div class="d-flex flex-column justify-content-center h-100">
                <div class="mb-2 text-muted fw-bold small text-center">Actions:</div>
                
                <!-- Always show QC Page -->
                <a class="btn btn-sm btn-light text-start mb-1 d-flex align-items-center" href="{{route('qcpage',['id'=>encrypt($case->id)])}}">
                  <i class="fas fa-eye text-primary me-2"></i>
                  <span class="small">View Details / QC</span>
                </a>
                
                @if($case->qc_id!=null && $case->pdfstatus==1)
                  @if(auth()->user()->role_id =='1')
                  <a class="btn btn-sm btn-light text-start mb-1 d-flex align-items-center" href="{{url('/reopen/'.encrypt($case->id))}}">
                    <i class="fas fa-undo text-danger me-2"></i>
                    <span class="small">Reopen Case</span>
                  </a>
                  @endif
                  
                  <a class="btn btn-sm btn-light text-start mb-1 d-flex align-items-center" href="{{route('downloadreport',['id'=>$case->id,'download'=>$case->images])}}">
                    <i class="fas fa-file-download text-info me-2"></i>
                    <span class="small">Download Report</span>
                  </a>
                  
                  <a class="btn btn-sm btn-light text-start mb-1 d-flex align-items-center" href="{{ route('downloadpics',['download'=>encrypt($case->images)]) }}">
                    <i class="fas fa-images text-success me-2"></i>
                    <span class="small">Download Pictures</span>
                  </a>
                @endif
                
                @if($case->pdfstatus==0)
                  @if($case->imgstatus!=0)
                  <a class="btn btn-sm btn-light text-start mb-1 d-flex align-items-center" href="{{ route('downloadpics',['download'=>encrypt($case->images)]) }}">
                    <i class="fas fa-images text-success me-2"></i>
                    <span class="small">Download Pictures</span>
                  </a>
                  @endif
                  
                  @if(auth()->user()->role_id =='1')
                  <a class="btn btn-sm btn-gss-primary text-white text-start mb-1 d-flex align-items-center" href="javascript:void(0);" onclick="editCaseInfo('{{ $case->id}}')">
                    <i class="fas fa-edit me-2"></i>
                    <span class="small">Edit Case Info</span>
                  </a>
                  @endif
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Case pagination">
          {!! $cases->links() !!}
        </nav>
      </div>
      
      <div class="d-flex justify-content-between align-items-center mt-2 text-muted small">
        <div>Showing {{ $cases->firstItem() ?? 0 }} to {{ $cases->lastItem() ?? 0 }} of {{ $cases->total() }} cases</div>
        <div>Page {{ $cases->currentPage() }} of {{ $cases->lastPage() }}</div>
      </div>
    </div>
  </div>
  @else
  <div class="alert alert-info d-flex align-items-center p-4 shadow-sm rounded-3">
    <i class="fas fa-info-circle me-3 fa-lg"></i> 
    <div>No cases found matching your criteria.</div>
  </div>
  @endif
</div>
@endsection

@section('scripts')
<script>
// Global variables for manufacturers and branches data
var globalBranches = {!! json_encode($branches->groupBy('c_id')) !!};
var globalManufacturers = {!! json_encode($manufacturers->groupBy('v_id')) !!};

// Wait for jQuery to be loaded since it's deferred
function initializeCaseList() {
  // Check if jQuery is available
  if (typeof $ === 'undefined') {
    // If not available, wait a bit and try again
    setTimeout(initializeCaseList, 100);
    return;
  }

  $(document).ready(function() {
    // Use Bootstrap's native modal hide function for all close buttons
    $('.modal-close-btn').on('click', function() {
      $('#caseEditModal').modal('hide');
    });

    // Event handler for vehicle type change
    $('#edit_vehicle_category').on('change', function() {
      populateManufacturers($(this).val(), null);
    });

    // Event handler for company change
    $('#edit_company').on('change', function() {
      populateBranches($(this).val(), null);
    });

    // AJAX form submission handler
    $('#updateCaseBtn').on('click', function(e) {
      e.preventDefault();
      updateCaseInfo();
    });
  });
}

// Start initialization when page loads
document.addEventListener('DOMContentLoaded', initializeCaseList);

// Define editCaseInfo function in global scope
window.editCaseInfo = function(caseId) {
    const $modal = $('#caseEditModal');
    
    // Store case ID in hidden field for later use
    $('#case_id').val(caseId);
    
    // Clear the images to remove array
    clearImagesToRemove();
    
    // Clear any previous validation errors
    clearValidationErrors();
    clearTabErrorIndicators();
    
    showLoadingState();
    
    // Fetch case data via AJAX
    $.ajax({
      url: `{{ url('/get-case-info') }}/${caseId}`,
      type: "GET",
      dataType: "json",
      success: function(data) {
        hideLoadingState();        
        // Populate all form fields with the fetched data
        $('#edit_customer_name').val(data.customer_name);
        $('#edit_customer_no').val(data.customer_no);
        $('#edit_customer_address').val(data.customer_address);
        
        $('#edit_vehicle_category').val(data.vehicle_category);
        $('#edit_vehicle_no').val(data.vehicle_no);
        $('#edit_chassis_no').val(data.chassis_no);
        $('#edit_engine_no').val(data.engine_no);
        $('#edit_vehicle_variant').val(data.vehicle_variant || '');
        
        $('#edit_company').val(data.company_id);
        $('#edit_icreferenceno').val(data.icreferenceno || '');
        
        // Format and set the inspection date
        if (data.inspection_date) {
          const date = new Date(data.inspection_date);
          const formattedDate = date.toISOString().slice(0, 16);
          $('#edit_inspection_date').val(formattedDate);
        }        
        // Populate manufacturers first, then set the selected value
        populateManufacturers(data.vehicle_category, data.manufacturer);
        
        // Also populate branches
        populateBranches(data.company_id, data.branch_id);
        
        // Handle visibility and content of the Images tab
        if (data.imgstatus == 1) {
          $('.image-tab-item').show();
          const $imagesContainer = $('#existing_images');
          $imagesContainer.empty();
          
          if (data.images && data.images.length > 0) {
            $.each(data.images, function(index, image) {
              const fullImageUrl = `{{ asset('storage') }}/${image}`;
              const imgHtml = `
                <div class="col-md-4 mb-3" data-image="${image}">
                  <div class="position-relative image-container">
                    <img src="${fullImageUrl}" class="img-thumbnail case-image" 
                         onerror="console.error('Failed to load image: ${fullImageUrl}');">
                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 image-remove-btn" 
                            onclick="removeImage('${image}', this)" 
                            title="Remove Image"
                            style="border-radius: 50%; width: 30px; height: 30px; padding: 0; font-size: 12px; z-index: 10;">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                  <div class="text-center mt-1">
                    <small class="text-muted">${image.split('/').pop()}</small>
                  </div>
                </div>`;
              $imagesContainer.append(imgHtml);
            });
          } else {
            // Display message when no images are available
            $imagesContainer.html('<div class="col-12 text-center text-muted py-4"><i class="fas fa-images fa-2x mb-2 text-muted"></i><br>No images available for this case</div>');
          }
        } else {
          $('.image-tab-item').hide();
        }
        
        // Reset to the first tab using Bootstrap's native API
        const firstTab = new bootstrap.Tab(document.querySelector('#customer-tab'));
        firstTab.show();
        
        // Show the modal
        $modal.modal('show');
      },
      error: function(error) {
        console.error('Error fetching case data:', error);
        hideLoadingState();
        alert('Error loading case data. Please try again.');
      }
    });
};

// Debug: Check if function is properly defined
// Also define as global function for backwards compatibility
if (typeof editCaseInfo === 'undefined') {
    function editCaseInfo(caseId) {
        return window.editCaseInfo(caseId);
    }
}

// Function to handle AJAX form submission for updating case info
function updateCaseInfo() {
    const caseId = $('#case_id').val();
    const $form = $('#case_form');
    const $updateBtn = $('#updateCaseBtn');
    
    // Show confirmation if images are marked for removal
    if (imagesToRemove.length > 0) {
        const confirmMessage = `You have marked ${imagesToRemove.length} image(s) for removal. This action cannot be undone. Continue with update?`;
        if (!confirm(confirmMessage)) {
            return;
        }
    }
    
    // Disable the update button to prevent double submissions
    $updateBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Updating...');
    
    // Create FormData object to handle file uploads
    const formData = new FormData();
    
    // Add CSRF token and method
    formData.append('_token', $('input[name="_token"]').val());
    formData.append('_method', 'PUT');
    
    // Add all form fields
    formData.append('customer_name', $('#edit_customer_name').val());
    formData.append('customer_no', $('#edit_customer_no').val());
    formData.append('customer_address', $('#edit_customer_address').val());
    formData.append('vehicle_category', $('#edit_vehicle_category').val());
    formData.append('vehicle_manufacturer', $('#edit_manufacturer').val());
    formData.append('vehicle_variant', $('#edit_vehicle_variant').val());
    formData.append('vehicle_no', $('#edit_vehicle_no').val());
    formData.append('chassis_no', $('#edit_chassis_no').val());
    formData.append('engine_no', $('#edit_engine_no').val());
    formData.append('company', $('#edit_company').val());
    formData.append('branch', $('#edit_branch').val());
    formData.append('icreferenceno', $('#edit_icreferenceno').val());
    formData.append('inspection_date', $('#edit_inspection_date').val());
    
    // Handle file uploads if any
    const fileInput = $('#edit_case_images')[0];
    if (fileInput.files.length > 0) {
        for (let i = 0; i < fileInput.files.length; i++) {
            formData.append('case_images[]', fileInput.files[i]);
        }
    }
    
    // Add images to remove
    if (imagesToRemove.length > 0) {
        imagesToRemove.forEach(function(imagePath) {
            formData.append('images_to_remove[]', imagePath);
        });
    }
    
    // Make AJAX request
    $.ajax({
        url: `{{ url('/update-case') }}/${caseId}`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Re-enable the button
            $updateBtn.prop('disabled', false).html('Update Case');
            
            // Clear any validation errors
            clearValidationErrors();
            clearTabErrorIndicators();
            
            // Show success message
            showSuccessMessage('Case updated successfully!');
            
            // Close the modal
            $('#caseEditModal').modal('hide');
            
            // Optionally reload the page or update the case card
            setTimeout(function() {
                location.reload();
            }, 1500);
        },
        error: function(xhr, status, error) {
            // Re-enable the button
            $updateBtn.prop('disabled', false).html('Update Case');
            
            // Handle different types of errors
            if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                // Handle validation errors - display them on the form fields
                displayValidationErrors(xhr.responseJSON.errors);
                
                // Show a general validation error message
                showErrorMessage('Please correct the highlighted errors and try again.');
            } else {
                // Handle other types of errors
                let errorMessage = 'Error updating case. Please try again.';
                
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    // Fallback for other error formats
                    const errors = xhr.responseJSON.errors;
                    errorMessage = Object.values(errors).flat().join('<br>');
                    
                    // Also display on form fields
                    displayValidationErrors(errors);
                }
                
                showErrorMessage(errorMessage);
            }
        }
    });
}

// Helper function to show success messages
function showSuccessMessage(message) {
    const alertHtml = `
        <div class="alert alert-success alert-dismissible fade show position-fixed" style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;" role="alert">
            <i class="fas fa-check-circle me-2"></i>${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;
    $('body').append(alertHtml);
    
    // Auto-dismiss after 3 seconds
    setTimeout(function() {
        $('.alert-success').alert('close');
    }, 3000);
}

// Helper function to show error messages
function showErrorMessage(message) {
    const alertHtml = `
        <div class="alert alert-danger alert-dismissible fade show position-fixed" style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;
    $('body').append(alertHtml);
    
    // Auto-dismiss after 5 seconds
    setTimeout(function() {
        $('.alert-danger').alert('close');
    }, 5000);
}

// Array to store images marked for removal
let imagesToRemove = [];

// Function to remove an image
function removeImage(imagePath, buttonElement) {
    if (confirm('Are you sure you want to remove this image?')) {
        // Add to removal list
        imagesToRemove.push(imagePath);
        
        // Remove from UI with animation
        $(buttonElement).closest('.col-md-4').fadeOut(300, function() {
            $(this).remove();
            
            // Show message if no images left
            if ($('#existing_images .col-md-4').length === 0) {
                $('#existing_images').html('<div class="col-12 text-center text-muted py-4"><i class="fas fa-images fa-2x mb-2 text-muted"></i><br>No images available</div>');
            }
        });
        
        console.log('Image marked for removal:', imagePath);
        console.log('Images to remove:', imagesToRemove);
        
        // Show confirmation message
        showSuccessMessage('Image marked for removal. Click "Update Case" to save changes.');
    }
}

// Function to clear the images to remove array (called when modal opens)
function clearImagesToRemove() {
    imagesToRemove = [];
}

// Debug function to test image URLs - call this from browser console
function testImageUrl(imagePath) {
    const fullUrl = `{{ url('storage') }}/${imagePath}`;
    console.log('Testing URL:', fullUrl);
    
    fetch(fullUrl, { method: 'HEAD' })
        .then(response => {
            console.log('Response status:', response.status);
            console.log('Response headers:', [...response.headers.entries()]);
            if (response.ok) {
                console.log('✅ Image is accessible');
            } else {
                console.log('❌ Image is not accessible');
            }
        })
        .catch(error => {
            console.error('❌ Error testing image:', error);
        });
}

// Test storage link function
function testStorageLink() {
    const testUrl = '{{ url("storage") }}';
    console.log('Testing storage link:', testUrl);
    
    fetch(testUrl)
        .then(response => {
            console.log('Storage link status:', response.status);
            if (response.ok) {
                console.log('✅ Storage link is working');
            } else {
                console.log('❌ Storage link is not working - run: php artisan storage:link');
            }
        })
        .catch(error => {
            console.error('❌ Error testing storage link:', error);
        });
}

// Helper function to populate manufacturer dropdown from global data
function populateManufacturers(vehicleTypeId, selectedManufacturerId) {
    
    const manufacturers = globalManufacturers[vehicleTypeId] || [];
    const $manufacturerSelect = $('#edit_manufacturer');
    $manufacturerSelect.empty().append('<option value="">Select Manufacturer</option>');
    manufacturers.forEach(function(manufacturer) {
        // Use manufacturer_name instead of name
        $manufacturerSelect.append(`<option value="${manufacturer.id}">${manufacturer.manufacturer_name}</option>`);
    });
    
    if (selectedManufacturerId) {
        // Convert to string to ensure proper comparison
        const manufacturerIdStr = String(selectedManufacturerId);
        $manufacturerSelect.val(manufacturerIdStr);
        
        // Verify if the value was set correctly and retry if needed
        setTimeout(function() {
            const currentValue = $manufacturerSelect.val();
            
            if (!currentValue && selectedManufacturerId) {
                // Try both string and original value
                $manufacturerSelect.val(selectedManufacturerId);
                if (!$manufacturerSelect.val()) {
                    $manufacturerSelect.val(manufacturerIdStr);
                }
                
                // If still not set, log all available options for debugging
                if (!$manufacturerSelect.val()) {
                    console.warn('Failed to set manufacturer. Available options:');
                    $manufacturerSelect.find('option').each(function() {
                        console.log('Option:', $(this).val(), $(this).text());
                    });
                    console.warn('Trying to set:', selectedManufacturerId, 'as string:', manufacturerIdStr);
                }
            }
        }, 100);
    }
}

// Helper function to populate branch dropdown from global data
function populateBranches(companyId, selectedBranchId) {
    const branches = globalBranches[companyId] || [];
    const $branchSelect = $('#edit_branch');
    $branchSelect.empty().append('<option value="">Select Branch</option>');
    
    branches.forEach(function(branch) {        // Use branch_name instead of name
        $branchSelect.append(`<option value="${branch.id}">${branch.branch_name}</option>`);
    });
    
    if (selectedBranchId) {
        $branchSelect.val(selectedBranchId);
    }
}

// UI Helper Functions for loading state
function showLoadingState() {
    const loadingHtml = '<div id="loading-overlay" style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.8); z-index:9999; display:flex; justify-content:center; align-items:center;"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
    $('body').append(loadingHtml);
}

function hideLoadingState() {
    $('#loading-overlay').remove();
}

// Functions for the old modals (can be removed if those modals are no longer used)
function changecompanyandbranch(comp) {
    const branches = globalBranches[comp] || [];
    const $branchSelect = $('#branch');
    $branchSelect.empty().append('<option value=""></option>');
    branches.forEach(function(branch) {
        $branchSelect.append(`<option value="${branch.id}">${branch.branch_name}</option>`);
    });
}

function changevehicletype(vtype) {
    const manufacturers = globalManufacturers[vtype] || [];
    const $manuSelect = $('#vmanu');
    $manuSelect.empty().append('<option value=""></option>');
    manufacturers.forEach(function(manufacturer) {
        $manuSelect.append(`<option value="${manufacturer.id}">${manufacturer.manufacturer_name}</option>`);
    });
}

/* New validation error handling functions */
function clearValidationErrors() {
    // Remove all existing error messages
    $('.invalid-feedback').remove();
    // Remove invalid class from form controls
    $('.form-control, .form-select').removeClass('is-invalid');
}

// Function to display validation errors on specific form fields
function displayValidationErrors(errors) {
    // Clear any existing errors first
    clearValidationErrors();
    
    // Field mapping from backend field names to frontend IDs
    const fieldMapping = {
        'customer_name': '#edit_customer_name',
        'customer_no': '#edit_customer_no',
        'customer_address': '#edit_customer_address',
        'vehicle_category': '#edit_vehicle_category',
        'vehicle_manufacturer': '#edit_manufacturer',
        'vehicle_variant': '#edit_vehicle_variant',
        'vehicle_no': '#edit_vehicle_no',
        'chassis_no': '#edit_chassis_no',
        'engine_no': '#edit_engine_no',
        'company': '#edit_company',
        'branch': '#edit_branch',
        'icreferenceno': '#edit_icreferenceno',
        'inspection_date': '#edit_inspection_date',
        'case_images': '#edit_case_images'
    };
    
    // Display errors for each field
    Object.keys(errors).forEach(function(fieldName) {
        const fieldSelector = fieldMapping[fieldName];
        if (fieldSelector) {
            const $field = $(fieldSelector);
            const errorMessages = errors[fieldName];
            
            // Add invalid class to the field
            $field.addClass('is-invalid');
            
            // Create error message HTML
            const errorHtml = `<div class="invalid-feedback d-block">
                ${errorMessages.join('<br>')}
            </div>`;
            
            // Insert error message after the field
            $field.after(errorHtml);
            
            // If it's a select field in a tab that's not active, show a visual indicator on the tab
            const $tabPane = $field.closest('.tab-pane');
            if ($tabPane.length && !$tabPane.hasClass('show')) {
              // Deselect all tabs first
              $('.nav-link').removeClass('active');
              $('.tab-pane').removeClass('show active');
              
              const tabId = $tabPane.attr('id');
              const $tabButton = $(`[data-bs-target="#${tabId}"]`);
              
              // Activate the tab with error
              $tabButton.addClass('active');
              $(`#${tabId}`).addClass('show active');
              
              if (!$tabButton.find('.error-indicator').length) {
                $tabButton.append(' <span class="error-indicator badge bg-danger ms-1">!</span>');
              }
            }
        }
    });
    
    // If there are validation errors, switch to the first tab with errors
    const $firstErrorField = $('.is-invalid').first();
    if ($firstErrorField.length) {
        const $tabPane = $firstErrorField.closest('.tab-pane');
        if ($tabPane.length) {
            const tabId = $tabPane.attr('id');
            const $tabButton = $(`[data-bs-target="#${tabId}"]`);
            if ($tabButton.length) {
                $tabButton.tab('show');
            }
        }
    }
}

// Function to clear error indicators from tabs
function clearTabErrorIndicators() {
    $('.error-indicator').remove();
}
</script>
@endsection