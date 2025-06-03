<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cname' => 'required',
            'cshort' => 'required',
        ]);
        $company= new Company();
        $company->Company_name=$request->cname;
        $company->shot_name=$request->cshort;
        $company->save();
        if($company->id){
            return redirect('addcompany')->with('status', 'Record added successfully !');        
        }else{
            return redirect('addcompany')->with('status', 'Oprestion failed !');        
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Company::with('branch')->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $company= Company::find($id);
        $company->Company_name=$request->cname;
        $company->shot_name=$request->cshort;
       
        if( $company->update()){
            return redirect('editcompany')->with('status', 'Record Updated successfully !');        
        }else{
            return redirect('editcompany')->with('status', 'Oprestion failed !');        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
