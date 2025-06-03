<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyBranchController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\FoController;
use App\Models\Company;
use App\Models\CompanyBranch;
use App\Models\Manufacturer;
use App\Models\Role;
use App\Models\User;
use App\Models\CaseModel;
use App\Models\Imageparts;
use App\Models\Fo;
use App\Models\VehicleType;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return redirect('caselist');
});
Route::group(['prefix' => 'admin'], function () {
    Auth::routes(['register' => false]);
});
Route::get('/home', function(){
    // $all = CaseModel::with('demagess.dem','companies','c_branch','fo')->find(4); 
    // return   $all;
  return  public_path('img/model.png');
});
Route::middleware('auth')->group(function () {
    Route::get('/addcompany', function () {
        return view('AddCompany');
    })->name('addcompany');
    Route::get('/editcompany', function () {
        $Company = Company::all();
        return view('EditCompany', ['companyies' => $Company]);
    })->name('editcompany');
    Route::get('/addcase', function () {
        $Company = Company::all();
        $vehicle = VehicleType::all();
        $fo = Fo::all();
        $Ros = User::where('role_id',2)->get();
        return view('AddCase', ['companyies' => $Company, 'vehicletypes' => $vehicle, 'fos' => $fo,'ros'=> $Ros]);
    })->name('addcase');
    Route::get('/editcase', function () {
        return view('EditCase');
    })->name('editcase');
    Route::get('/addbranch', function () {
        $Company = Company::all();
        return view('AddBranch', ['companyies' => $Company]);
    })->name('addbranch');
    Route::get('/editbranch', function () {
        $Company = Company::all();
        $branch = CompanyBranch::with('company')->get();
        return view('EditBranch', ['branches' => $branch, 'companyies' => $Company]);
    })->name('editbranch');
    Route::get('/addmanufacturer', function () {
        $vehicle = VehicleType::all();
        return view('AddManufacturer', ['vehicletypes' => $vehicle]);
    })->name('addmanufacturer');
    Route::get('/editmanufacturer', function () {
        $vehicle = VehicleType::all();
        $manufacturer = Manufacturer::with('vehicletype')->get();
        return view('EditManufacturer', ['vehicletypes' => $vehicle, 'manufacturers' => $manufacturer]);
    })->name('editmanufacturer');
    Route::get('/adduser', function () {
        if (Auth::user()->role_id == 2) {
            $roles = Role::all()->except(1)->except(2);
            $ros = User::where(['role_id' => 3])->get();
        } elseif (Auth::user()->role_id == 1) {
            $roles = Role::all()->except(1);
            $ros = User::where(['role_id' => 2])->get();
        }
        return view('/AddUser', ['roles' => $roles, 'ros' => $ros]);
    })->name('adduser');
    Route::get('/edituser', function () {

        if (Auth::user()->role_id == 2) {
            $roles = Role::all()->except(1)->except(3);
            $users = User::with('role')->where(['parent_id' => Auth::user()->id, 'role_id' => 3])->get();
        } elseif (Auth::user()->role_id == 1) {
            $users = User::with('role')->where('role_id', '!=', Auth::user()->role_id)->get();
            $roles = Role::all()->except(1);
        }
        return view('EditUser', ['users' => $users, 'roles' => $roles]);
    })->name('edituser');
    Route::get('/userdetails/{id}', [AuthController::class, 'userdetails']);
    Route::get('/deactiveuser/{id}', [AuthController::class, 'deactiveuser']);
    Route::post('/edituserdetails/{id}', [AuthController::class, 'updateuserdetails']);
    Route::resources([
        'company' => CompanyController::class,
        'branch' => CompanyBranchController::class,
        'manufacturer' => ManufacturerController::class,
        'fo' => FoController::class,
    ]);
    Route::post('/registeruser', [AuthController::class, 'register'])->name('registeruser');
    Route::get('/getvehicledetalis/{id}', function ($id) {
        return VehicleType::with('manufacturer')->find($id);
    });

    Route::post('/createcase', [CaseController::class, 'create_case']);
    Route::get('/addcaseinfo/{id}', [CaseController::class, 'addcaseinfo'])->name('addcaseinfo');
    Route::get('/caselist',[CaseController::class, 'caselist'])->name('caselist');
    Route::get('/addfo', function () {
        return view('AddFo');
    })->name('addfo');;
    Route::get('/editfo', function () {
        $fo = Fo::all();
        return view('Editfo', ['fos' => $fo]);
    })->name('editfo');;
    Route::post('/rename', [CaseController::class, 'rename']);
    Route::get('qcpage/{id}', [CaseController::class, 'qc'])->name('qcpage');
    Route::get('downloadpics', [CaseController::class, 'downloadpics'])->name('downloadpics');
    Route::post('/markqc/{id}',[CaseController::class, 'markqc']);
    Route::post('/search',[CaseController::class, 'search']);
    Route::get('/reopen/{id}',[CaseController::class, 'reopen']);
    Route::get('downloadreport',[CaseController::class, 'downloadreport'])->name('downloadreport');
    Route::get('/view',function(){
        $all = CaseModel::with('demagess.dem','manufacturers','companies','fual','c_branch','fo')->find(1);
    //    return  $all;
    $qrcode = base64_encode(\QrCode::format('svg')->size(100)->errorCorrection('H')->generate(route('downloadreport',['id'=>1,'download'=>$all->images])));
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']); 
        $pdf = PDF::loadView('pdf',['cases'=>$all,'qrcode'=>  $qrcode ]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download($all->id.'.pdf');
    }); 
    Route::put('/changecompany/{id}',[CaseController::class, 'changecompany']);
    Route::put('/changevcat/{id}',[CaseController::class, 'changevcat']);
    Route::get('/allcsv',[CaseController::class, 'download']);
    Route::get('/misdownload', function (){
        $Ros = User::where('role_id',2)->get();
        $Company = Company::all();
        return view('MisExcel',['ros'=>$Ros, 'companyies'=>$Company]);
    })->name('misdownload');
    Route::post('/misdownload',[CaseController::class, 'download']);
});
