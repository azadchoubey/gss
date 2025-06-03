<?php

namespace App\Http\Controllers;

use App\Models\Fo;
use Illuminate\Http\Request;

class FoController extends Controller
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
            'uname' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
        ]);
        $fo = new Fo();
        $fo->name = $request->uname;
        $fo->mobile = $request->mobile;
        $fo->email = $request->email;
        $fo->save();
        if($fo->id){
            return redirect('addfo')->with('status', 'Record Updated successfully !');        
        }else{
            return redirect('editcompany')->with('status', 'Oprestion failed !');        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fo  $fo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Fo::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fo  $fo
     * @return \Illuminate\Http\Response
     */
    public function edit(Fo $fo)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fo  $fo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fo= Fo::find($id);
        $fo->name = $request->uname;
        $fo->mobile = $request->mobile;
        $fo->email = $request->email;
       
        if( $fo->update()){
            return redirect('editfo')->with('status', 'Record Updated successfully !');        
        }else{
            return redirect('editfo')->with('status', 'Oprestion failed !');        
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fo  $fo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fo $fo)
    {
        //
    }
}
