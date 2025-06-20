<?php

namespace App\Http\Controllers;

use App\Models\CompanyBranch;
use Illuminate\Http\Request;

class CompanyBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'company' => 'required',
            'branch' => 'required',
        ]);
        $branch= new CompanyBranch();
        $branch->c_id=$request->company;
        $branch->branch_name=$request->branch;
        $branch->save();
        if($branch->id){
            return redirect('addbranch')->with('status', 'Record added successfully !');        
        }else{
            return redirect('addbranch')->with('status', 'Oprestion failed !');        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyBranch  $companyBranch
     * @return \Illuminate\Http\Response
     */
    public function show($id,CompanyBranch $companyBranch)
    {
        return response()->json($companyBranch->with('company')->find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyBranch  $companyBranch
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyBranch $companyBranch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyBranch  $companyBranch
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, CompanyBranch $companyBranch)
    {
        $companyBranch= $companyBranch->find($id);
        $companyBranch->c_id=$request->company;
        $companyBranch->branch_name=$request->cshort;
       
        if( $companyBranch->update()){
            return redirect('editbranch')->with('status', 'Record Updated successfully !');        
        }else{
            return redirect('editbranch')->with('status', 'Oprestion failed !');        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyBranch  $companyBranch
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyBranch $companyBranch)
    {
        //
    }
    
    /**
     * Get branches for a specific company
     *
     * @param int $companyId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBranches($companyId)
    {
        try {
            $branches = CompanyBranch::where('c_id', $companyId)->get();
            return response()->json($branches);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
