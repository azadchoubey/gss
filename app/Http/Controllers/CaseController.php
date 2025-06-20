<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseModel;
use App\Models\Manufacturer;
use App\Models\User;
use App\Models\Bodycondition;
use App\Models\Casetype;
use App\Models\Fuel;
use App\Models\CaseDamages;
use App\Models\InspectionStatus;
use App\Models\Paymentmode;
use App\Models\Policytype;
use App\Models\Company;
use App\Models\CompanyBranch;
use App\Models\Rcstatus;
use App\Models\ValuationModel;
use App\Models\Valuationtype;
use ZipArchive;
use App\Models\VehicleType;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use App\Exports\Case_export;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Maatwebsite\Excel\Facades\Excel as Excel;
class CaseController extends Controller
{
    public function create_case(Request $request)
    {
   
        $this->validate($request, [
            'company' => 'required',
            'branch' => 'required',
            'iref' => 'required',
            'vnum' => 'required',
            'vcat' => 'required',
            'vmanu' => 'required',
            'vv' => 'required',
            'file' => 'required',
            "fo" => 'required',
            "cname" => "required"
        ]);
        $CaseModel = new CaseModel();
        $CaseModel->company_name = $request->company;
        $CaseModel->company_branch = $request->branch;
        $CaseModel->insurance_ref = $request->iref;
        $CaseModel->vehicle_no = trim(strtoupper($request->vnum));
        $CaseModel->vehicle_category = $request->vcat;
        $CaseModel->vehicle_manufacturer = $request->vmanu;
        $CaseModel->vehicle_variant = $request->vv;
        $CaseModel->customer_name = $request->cname;
        $CaseModel->fo_id = $request->fo;
        $CaseModel->inspection_date = $request->date;
        $CaseModel->case_by =$request->ro?$request->ro:Auth::user()->id;
        $CaseModel->save();
        if ($CaseModel->id) {
            if ($request->has('file')) {
                for ($i = 0; $i < count($request->file); $i++) {
                    $destinationPath = date("Y") . '/' . date("F") . '/' . date("d") . '/' . $CaseModel->id;
                    $filename = $request->file[$i]->getClientOriginalName();
                    $request->file[$i]->storeAs($destinationPath . '/images', $filename);
                    $CaseModel->images = 'storage/' . $destinationPath;
                    $CaseModel->save();
                }
            }
            return redirect('addcaseinfo/' . encrypt($CaseModel->id) . '')->with('status', 'Record added successfully with Case ID :' . $CaseModel->id . ' !');
        } else {
            return redirect('addcase')->with('status', 'Oprestion failed !');
        }
    }
    public function addcaseinfo($id)
    {
        $case = CaseModel::with('vehicle_cat.imagetype')->where('imgstatus', 0)->find(decrypt($id));
        if ($case) {
            return view('AddCaseinfo', ['cases' => $case]);
        } else {
            return redirect()->route('qcpage', ['id' => $id]);
        }
    }
    public function qc($id)
    {
        $case = CaseModel::with('vehicle_cat', 'manufacturers','companies', 'c_branch', 'vehicle_cat.parts', 'vehicle_cat.manufacturer','demagess.dem')->where(['pdfstatus' => 0, 'imgstatus' => 1])->find(decrypt($id));
        $Bodycondition = Bodycondition::all();
        $Casetype = Casetype::all();
        $Fuel = Fuel::all();
        $InspectionStatus = InspectionStatus::all();
        $Paymentmode = Paymentmode::all();
        $Policytype = Policytype::all();
        $Rcstatus = Rcstatus::all();
        $ValuationModel = ValuationModel::all();
        $valuationtype = valuationtype::all();
        if ($case) {
            return view('QcPage', [
                'cases' => $case,
                'Bodyconditions' => $Bodycondition,
                'Casetypes' => $Casetype,
                'Fuels' => $Fuel,
                'InspectionStatuss' => $InspectionStatus,
                'Paymentmodes' => $Paymentmode,
                'Policytypes' => $Policytype,
                'Rcstatuss' => $Rcstatus,
                'ValuationModels' => $ValuationModel,
                'valuationtypes' => $valuationtype
            ]);
        } else {
            return redirect()->route('addcaseinfo', ['id' => $id]);
        }
    }

    public function rename(Request $request)
    {
        $php_array =  json_decode($request->value, true);
        for ($i = 0; $i < count($php_array); $i++) {
            $dir_path = public_path() . '/' . $php_array[$i]['path'] . '/images/' . $php_array[$i]['file'];
            $newpath = public_path() . '/' . $php_array[$i]['path'] . '/images/' . $php_array[$i]['name'] . '_' . random_int(100000000, 999999999) . '.jpeg';

            rename($dir_path, $newpath);
            $imgarr[] = $newpath;
        }

        if (CaseModel::where("id", decrypt($php_array[0]['params']))->update(["imgstatus" => 1])) {
            $zip = new ZipArchive;
            $storage_path = public_path() . '/' . $php_array[0]['path'] . '/zip';
            File::ensureDirectoryExists($storage_path);
            $timeName = time();
            $zipFileName = $storage_path . '/' . $timeName . '.zip';
            if ($zip->open(($zipFileName), ZipArchive::CREATE) === true) {
                foreach ($imgarr as $relativName) {
                    $zip->addFile($relativName, basename($relativName));
                }
                $zip->close();

                if ($zip->open($zipFileName) === true) {
                    return response()->json(['success' => true, 'url' => route('qcpage', ['id' => $php_array[0]['params']])]);
                } else {
                    return response()->json(['success' => false]);
                }
            }
        } else {
            return response()->json(['success' => false]);
        }
    }
    public function downloadpics(Request $request)
    {
        $public_dir = public_path();
        $path = $public_dir . '/' . decrypt($request->query('download')) . '/zip';
        $dir = new \DirectoryIterator($path);
        foreach ($dir as $file) {
            if (!$file->isDot()) {
                return response()->download($file);
            }
        }
    }
    public function caselist()
    {
        $res = ["vtype" => '', "in" => '', 'search' => ''];
        $vehilcetype = VehicleType::all();
        $Company = Company::all();
        $vehicle = VehicleType::all();
        $branch = CompanyBranch::with('company')->get();
        $manufacturers = Manufacturer::with('vehicletype')->get();
        if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3) {
            $user = new User();
            $ro = $user->where(['id' => Auth::user()->id])->orWhere('parent_id', Auth::user()->id)->orWhere('id', Auth::user()->parent_id != 0 ? Auth::user()->parent_id : '')->get();
    
                $cases = new CaseModel();
            $cases->with('fo', 'companies.branch');
            foreach ($ro as $record) {

                $data[] = $cases->where('case_by', $record->id)->get();
            }
            
            $data1 = [];
            foreach ($data as $a) {
                foreach ($a as $final) {

                    $data1[] = $final;
                }
            }
            $pagination = new Paginator($data1, 5);
        }
      

        if (Auth::user()->role_id == 1) {
            $cases = new CaseModel();
            $pagination = $cases->with('fo', 'companies.branch')->paginate(5);
        }
        return view('CaseList', ['cases' =>   $pagination  , 'vehiles' => $vehilcetype, 'resquest' => $res,'branches' => $branch, 'companyies' => $Company,'vehicletypes' => $vehicle, 'manufacturers' => $manufacturers]);
    }
    public function markqc(Request $request, $id)
    {
        $case = CaseModel::find(decrypt($id));
        $path =$case->images;
        $case->insurance_ref = $request->icreferenceno;
        $case->req_no = $request->rcontact;
        $case->req_name = $request->rname;
        $case->req_code = $request->rcode;
        $case->req_email = $request->remail;
        $case->customer_name = $request->cname;
        $case->customer_address = $request->caddress;
        $case->customer_no = $request->ccontact;
        $case->inspection_address = $request->inspectionaddress;
        $case->vehicle_no = trim(strtoupper($request->vnumber));
        $case->chassis_no = $request->cnumber;
        $case->engine_no = $request->enumber;
        $case->odo_meter = $request->odometer;
        $case->rc_verified = $request->rcverified;
        $case->year = $request->vmodel;
        $case->vehicle_variant = $request->vvariant;
        $case->fuel_used = $request->fuelused;
        $case->case_type = 1;
        $case->vehicle_colour = $request->vcolor;
        $case->engine_started = $request->enginestarted == "Yes" ? 1 : 0;
        $case->remarks = $request->remarks;
        $case->inspection_status = $request->inspectionstatus;
        $case->payment_mode = $request->paymentmode;
        $case->pdfstatus = 1;
        $case->qc_id = Auth::user()->id;
        if ($case->update()) {
            $case =   CaseDamages::where('case_id', decrypt($id))->first();
            if ($case) {
                CaseDamages::where('case_id', decrypt($id))->delete();
            }

            foreach ($request->vehcile as $key => $vehicle) {
                $vehciledamges = new CaseDamages();
                $vehciledamges->case_id = decrypt($id);
                $vehciledamges->damages = $key;
                $vehciledamges->values = $vehicle;
                $vehciledamges->save();
            }
            $all = CaseModel::with('demagess.dem','manufacturers','companies','fual','c_branch','fo')->find(decrypt($id));
            $qrcode = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate(route('downloadreport',['id'=>decrypt($id),'download'=> $path])));
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']); 
            $pdf = PDF::loadView('pdf',['cases'=>$all,'qrcode'=>$qrcode]);
            $pdf->setPaper('A4', 'portrait');
            return $pdf->download(decrypt($id).'.pdf');

        } else {
            return redirect()->back()->withErrors(['msg' => 'oprection failed']);
        }
    }
    public function search(Request $request)
    {
        $vehilcetype = VehicleType::all();

        $res = $request->all();
        $case = CaseModel::where(function ($query) use ($res) {
            if ($res['vtype'] != "") {
                $query->where('vehicle_category', '=', $res['vtype']);
            }
            if ($res['in'] == "id" && $res['search'] != "") {
                $query->where('id', '=', $res['search']);
            }
            if ($res['in'] == "vnumber" && $res['search'] != "") {
                $query->where('vehicle_no', '=', $res['search']);
            }
            if ($res['in'] == "cnumber" && $res['search'] != "") {
                $query->where('chassis_no', '=', $res['search']);
            }
            if ($res['in'] == "icreferenceno" && $res['search'] != "") {
                $query->where('insurance_ref', '=', $res['search']);
            }
        })->with('fo', 'companies.branch')->paginate(5);
        return view('CaseList', ['cases' =>   $case, 'vehiles' => $vehilcetype, 'resquest' => $res]);
    }
    public function reopen($id)
    {
        $case = CaseModel::find(decrypt($id));
        $case->pdfstatus=0;
        $case->update();
        return redirect()->back()->with('status' , 'Case Reopen Successfully');

    }
    public function downloadreport(Request $request){
        $public_dir = public_path();
        $path = $public_dir . '/' . $request->query('download') . '/zip';
        $dir = new \DirectoryIterator($path);
        foreach ($dir as $file) {
            if (!$file->isDot()) {
                return response()->download($file);
            }else{
        $all = CaseModel::with('demagess.dem','manufacturers','companies','fual','c_branch','fo')->find($request->query('id'));
        $qrcode = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate(route('downloadreport',['id'=>$request->query('id'),'download'=>$request->query('download')])));
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']); 
        $pdf = PDF::loadView('pdf',['cases'=>$all,'qrcode'=> $qrcode ]);
        $pdf->setPaper('A4', 'portrait');
        $path = public_path($request->query('download').'/Pdf');
        File::ensureDirectoryExists($path);
        $fileName = $request->query('id') . '.' . 'pdf' ;
        $pdf->save($path . '/' . $fileName);
        return $pdf->download($fileName);
         }
        }
    }
    public function changecompany($id, Request $request){
        $case = CaseModel::find($id);
        $case->company_name=$request->company;
        $case->company_branch=$request->branch;
        if($case->update()){
            return redirect('caselist')->with('status', 'Record Updated successfully !');        
        }else{
            return redirect('caselist')->with('status', 'Oprestion failed !');        
        }


    }
    public function changevcat($id, Request $request){
        $case = CaseModel::find($id);
        $case->vehicle_category=$request->vehicletype;
        $case->vehicle_manufacturer=$request->mname;
        if($case->update()){
            return redirect('caselist')->with('status', 'Record Updated successfully !');        
        }else{
            return redirect('caselist')->with('status', 'Oprestion failed !');        
        }


    }
    public function download(Request $request)
    {
        
        return Excel::download(new Case_export($request), rand(00000,99999).'.csv');
    }
    
    /**
     * Get detailed case information for editing
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCaseInfo($id)
    {
        try {
            $case = CaseModel::with([
                'companies', 
                'c_branch', 
                'fo', 
                'manufacturers'
            ])->findOrFail($id);
            $data = [
                'id' => $case->id,
                'customer_name' => $case->customer_name,
                'customer_no' => $case->customer_no,
                'customer_address' => $case->customer_address,
                'vehicle_category' => $case->vehicle_category,
                'manufacturer' => $case->vehicle_manufacturer,
                'vehicle_no' => $case->vehicle_no,
                'chassis_no' => $case->chassis_no,
                'engine_no' => $case->engine_no,
                'company_id' => $case->company_name,
                'branch_id' => $case->company_branch,
                'icreferenceno' => $case->insurance_ref,
                'vehicle_variant' => $case->vehicle_variant,
                'inspection_date' => $case->inspection_date,
                'imgstatus' => $case->imgstatus,
                'images' => $case->imgstatus == 1 ? $this->getImagesList($case->images) : [],
            ];
            
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Case not found or ' . $e->getMessage()], 404);
        }
    }
    
    /**
     * Get list of images from the case images directory
     *
     * @param string $imagesDir
     * @return array
     */
    private function getImagesList($imagesDir)
    {
        // Remove 'storage/' prefix if present and add '/images' subdirectory
        $cleanPath = str_replace('storage/', '', $imagesDir);
        $imagesPath = storage_path('app/public/' . $cleanPath . '/images');
        $images = [];
        
        // Log the path being checked for debugging
        Log::info("Looking for images in: " . $imagesPath);
        
        if (File::exists($imagesPath)) {
            $files = File::files($imagesPath);
            Log::info("Found " . count($files) . " files in directory");
            
            foreach ($files as $file) {
                $extension = strtolower($file->getExtension());
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    // Return relative path for use in frontend
                    $relativePath = $cleanPath . '/images/' . $file->getFilename();
                    $images[] = $relativePath;
                    Log::info("Added image: " . $relativePath);
                }
            }
        } else {
            Log::warning("Images directory does not exist: " . $imagesPath);
        }
        
        Log::info("Returning " . count($images) . " images");
        return $images;
    }
    
    /**
     * Update case information
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCase(Request $request, $id)
    {
        try {
            // Validate request
            $this->validate($request, [
                'customer_name' => 'required|string|max:255',
                'customer_no' => 'required|string|max:20',
                'customer_address' => 'required|string',
                'vehicle_category' => 'required|exists:vehicle_types,id',
                'vehicle_manufacturer' => 'required|exists:manufacturers,id',
                'vehicle_no' => 'required|string|max:50',
                'company' => 'required|exists:companies,id',
                'branch' => 'required|exists:company_branches,id',
                'case_images.*' => 'sometimes|image|mimes:jpeg,png,jpg|max:5120', // 5MB max per image
            ]);
            
            // Find the case
            $case = CaseModel::findOrFail($id);
            
            // Update customer info
            $case->customer_name = $request->input('customer_name');
            $case->customer_no = $request->input('customer_no');
            $case->customer_address = $request->input('customer_address');
            
            // Update vehicle info
            $case->vehicle_category = $request->input('vehicle_category');
            $case->vehicle_manufacturer = $request->input('vehicle_manufacturer');
            $case->vehicle_variant = $request->input('vehicle_variant');
            $case->vehicle_no = $request->input('vehicle_no');
            $case->chassis_no = $request->input('chassis_no');
            $case->engine_no = $request->input('engine_no');
            
            // Update company info
            $case->company_name = $request->input('company');
            $case->company_branch = $request->input('branch');
            $case->insurance_ref = $request->input('icreferenceno')?? '';
            
            if ($request->input('inspection_date')) {
                $case->inspection_date = $request->input('inspection_date');
            }
            
            // Handle image removal if imgstatus is 1 and images are marked for removal
            if ($case->imgstatus == 1 && $request->has('images_to_remove')) {
                $imagesToRemove = $request->input('images_to_remove');
                $removedCount = 0;
                
                foreach ($imagesToRemove as $imagePath) {
                    // Construct the full file path
                    $fullPath = storage_path('app/public/' . $imagePath);
                    
                    if (File::exists($fullPath)) {
                        try {
                            File::delete($fullPath);
                            $removedCount++;
                            Log::info("Successfully removed image: {$imagePath}");
                        } catch (\Exception $e) {
                            Log::error("Failed to remove image {$imagePath}: " . $e->getMessage());
                        }
                    } else {
                        Log::warning("Image not found for removal: {$fullPath}");
                    }
                }
                
                Log::info("Removed {$removedCount} images for case {$case->id}");
            }
            
            // Handle image upload if files are provided and imgstatus is 1
            if ($case->imgstatus == 1 && $request->hasFile('case_images')) {
                // Extract the base path from the database (e.g., "storage/2023/March/29/2" -> "2023/March/29/2")
                $basePath = str_replace('storage/', '', $case->images);
                // Add '/images' subdirectory to match create_case method
                $targetDir = $basePath . '/images';
                
                $uploadedCount = 0;
                // Store each uploaded image using Laravel's storage system (default disk)
                foreach ($request->file('case_images') as $image) {
                    if ($image->isValid()) {
                        $fileName = $image->getClientOriginalName();
                        try {
                            // Store the file using Laravel's storage system
                            $stored = $image->storeAs($targetDir, $fileName, 'public');
                            if ($stored) {
                                $uploadedCount++;
                                Log::info("Successfully uploaded: {$fileName} to {$targetDir}");
                            }
                        } catch (\Exception $e) {
                            Log::error("Failed to upload {$fileName}: " . $e->getMessage());
                        }
                    }
                }
                
                // Log the upload result for debugging
                Log::info("Image upload attempt for case {$case->id}: {$uploadedCount} files uploaded to {$targetDir}");
            }
            
            // Save changes
            $case->save();
            
            // Return JSON response for AJAX requests
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Case updated successfully!',
                    'case' => $case
                ]);
            }
            
            return redirect()->route('caselist')->with('status', 'Case updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors for AJAX requests
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $e->errors()
                ], 422);
            }
            
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Return JSON response for AJAX requests
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update case: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to update case: ' . $e->getMessage())->withInput();
        }
    }
    
    /**
     * Get manufacturers for a specific vehicle type
     *
     * @param int $vehicleTypeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getManufacturers($vehicleTypeId)
    {
        try {
            $manufacturers = Manufacturer::where('v_id', $vehicleTypeId)->get();
            return response()->json($manufacturers);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

