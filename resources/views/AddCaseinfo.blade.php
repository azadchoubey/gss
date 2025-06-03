@extends('layouts.app')
@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>

@endif
<table>
@php
$dir_path = public_path() . '/'.$cases->images.'/images';
   $dir = new DirectoryIterator($dir_path);
 echo '<div class="container" ><div class="row" > 
 ';
  foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
      echo '
            <div class="col-md-3 mb-3">
        <div class="card">
        <img data-id="'.$fileinfo.'" data-path="'.$cases->images.'" data-param="'.Request()->id .'" src="'.asset(''.$cases->images.'/images/'.$fileinfo).'" width="120px" class="card-img-top">
  <div class="card-body">

    <select class="form-control mb-2" name="img" id="img" onchange="set(this,this.parentElement.parentElement.firstChild)" >
      <option  value="">-- Select Part Name --</option>';
      foreach($cases->vehicle_cat->imagetype as $part){

          echo '
          <option  value="'.$part->part_name.'">'.$part->part_name.'</option>';
    } echo'
    </select>
  </div>
    
</div>
</div>
    ';
    } 
   
}

echo '<input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" /></div>
<div class="row">
  <div class="col-md-12 d-flex justify-content-center">
<input type="button" value="Submit" class="btn btn-dark btn-lg my-4" onclick="saveimgname()" style="width:400px ;"/>
</div>
</div></div>';

@endphp


@endsection