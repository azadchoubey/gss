<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
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
            'vehicletype' => 'required',
            'manufacturer' => 'required',
        ]);
        $Manufacturer= new Manufacturer();
        $Manufacturer->v_id=$request->vehicletype;
        $Manufacturer->manufacturer_name=$request->manufacturer;
        $Manufacturer->save();
        if($Manufacturer->id){
            return redirect('addcompany')->with('status', 'Record added successfully !');        
        }else{
            return redirect('addcompany')->with('status', 'Oprestion failed !');        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Manufacturer::with('vehicletype')->find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $manufacturer= Manufacturer::find($id);
        $manufacturer->v_id=$request->vehicletype;
        $manufacturer->manufacturer_name=$request->cshort;
       
        if( $manufacturer->update()){
            return redirect('editmanufacturer')->with('status', 'Record Updated successfully !');        
        }else{
            return redirect('editmanufacturer')->with('status', 'Oprestion failed !');        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        //
    }
}
