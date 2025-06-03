<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<body>
  <table style="border:#fff; width: 100%;">
    <tr style="border: 1px solid #fff">
      <td style="border: 1px solid #fff">
        <div style="background-color: skyblue;
          font-size: 10px;
          width: 80%; padding:10px;">
          <h1>Autosecure</h1>
          <p><b>Contact Number:</b> 9888098880</p>
          <p><b>Email:</b> operation.autosecure@gmail.com</p>
        </div>
      </td>
      <td style="text-align:left; border: 1px solid #fff; font-size: 12px;">
        <h2>VEHICLE INSPECTION REPORT</h2>
        <p style="font-weight: bold;">Dated: {{$cases->inspection_date?$cases->inspection_date:''}}</p>
        <p style="font-weight: bold;">Reference Number: {{$cases->id}}</p>
      </td>
      <td style="border: 1px solid #fff;">
      <img src="data:image/png;base64, {!! $qrcode !!}">
      </td>
    </tr>
  </table>
  </div>
  <table style="width: 100%;">
    <tr>
      <th style="background-color:#d3d3d3; font-size: 12px; font-weight: bold; ">INSPECTION FOR</th>
    </tr>
  </table>
  <table style="font-size: 10px; width: 100%;">
    <tr>
      <td>Company Name: {{$cases->companies->Company_name}}</td>
      <td>Branch Office: {{$cases->c_branch->branch_name}}</td>
      <td>Insurance Company Ref No: {{$cases->insurance_ref}}</td>
    </tr>
    <tr>
      <td>Insured: {{$cases->customer_name}}</td>
      <td>Vehicle Number: {{$cases->vehicle_no}}</td>
      <td>Chassis Number: {{$cases->chassis_no}}</td>
    </tr>
    <tr>
      <td>Engine Number: {{$cases->engine_no}}</td>
      <td>Make: {{$cases->manufacturers->manufacturer_name}}</td>
      <td>Model: {{$cases->vehicle_variant}}</td>
    </tr>
    <tr>
      <td>Color: {{$cases->vehicle_colour}}</td>
      <td>Manufacturing Year: {{$cases->year}}</td>
      <td>Class: {{$cases->vehicle_cat->vehicle_type}}</td>
    </tr>
    <tr>
      <td>Odometer Reading: {{$cases->odo_meter}}</td>
      <td>Fuel Type: {{$cases->fual->fuel_type}} </td>
      <td>Inspection On: {{$cases->inspection_date}}</td>
    </tr>
    <tr>
      <td>Inspection By: {{$cases->fo->name}}</td>
      <td>Inspection In:{{$cases->inspection_address}}</td>
      <td>Inspection Type:{{$cases->casetypes->case_type}}</td>
    </tr>
    <tr>
      @php

      if ($cases->ins_status->inspection_status == 'Recommended') {
      $color = "green";
      }elseif ($cases->ins_status->inspection_status == 'Refered to Underwriter') {
      $color = "orange";
      }else{
      $color = "red";
      }

      @endphp
      <td style="background-color:{{ $color }}; color:white;">Status: {{$cases->ins_status->inspection_status}}</td>
    </tr>
  </table>
  <table style="margin-top: 15px; width: 100%; font-size: 12px;">
    <tr>
      <th style="background-color:#d3d3d3;">IDENTIFICATION AND INSPECTION</th>
    </tr>
  </table>
  <table style="font-size: 10px;  width: 100%; ">
    @foreach($cases->demagess->chunk(3) as $chunk)
    <tr>
      @foreach($chunk as $item)
      @php
      if ($item->dem->vehicle_damages == 'Safe' || $item->dem->vehicle_damages == 'Good') {
      $color1 = "White";
      }else{
      $color1= "#FFCACA";
      }

      @endphp
      <td style="background-color:{{$color1 }};">{{$item->damages}} : {{$item->dem->vehicle_damages}}</td>
      @endforeach
    </tr>
    @endforeach


  </table>
  <!-- <table style="margin-top: 15px; width: 100%; font-size: 12px;">
    <tr>
      <th style="background-color: #d3d3d3; margin-top: 15px; width: 100%; font-size: 12px;">ACCESSORIES</th>
    </tr>
  </table>
  <table style="font-size: 10px;  width: 100%;">
    <tr>
      <td>1. CD Changer Make: N/A</td>
      <td>2. Centre Lock: N/A</td>
      <td>3. Engine Starting Condition: Yes</td>
    </tr>
    <tr>
      <td>4. Gear Locking: N/A</td>
      <td>5. Other Electrical: N/A</td>
      <td>6. Other Non-Electrical: N/A</td>
    </tr>
    <tr>
      <td>7. Seat Cover: Yes</td>
      <td>8. Stereo Make: N/A</td>
      <td></td>
    </tr>
  </table> -->

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <table style="margin-top: 15px; width: 100%; font-size: 12px;">
          <tr>
            <th style="background-color: #d3d3d3; margin-top: 15px; font-size: 12px;">INSPECTION REMARKS</th>
            <th style="background-color: #d3d3d3; margin-top: 15px; font-size: 12px;">Chassis</th>
          </tr>
          <tr>
            <td>
              {{$cases->remarks}}
            </td>
            @php
            $dir_path = public_path() . '/'.$cases->images.'/images';
            $files = glob($dir_path.'/Chassis_*');

            @endphp
            <td style="padding:0px; padding-bottom:0px;"><img src="{{$files[0]}}" height="135vh" width="100%"></td>
          </tr>
        </table>
      </div>

    </div>
  </div>

  <div class="container" style="margin-top: 15px; ">
    <div class="row">
      <div style="font-size:12px;">
        <b>Declaration Of Owners :</b>
        I hereby confirm and declare that above mentioned identification details of my vehicle as well as that of damages to the vehicle noted by the inspecting officer
        are correct. Nothing has been hidden/undisclosed.
        I further confirm & declare that the Motor Vehicle proposed for insurance after a break in cover has not met with any accident giving rise to any claim by a Third
        Party for injury or death caused to any Person/Property/insured vehicle during the period following the expiry of a previous insurance, till the moment it is
        proposed for insurance.
        I also agree that damages mentioned above or seen in photographs shall be excluded in the event of any claim being lodged.<br />
        <b>Declaration:- This is computer generated report and need not required any signature.</b>
      </div>
      <div style="width:100%">
        <img src="" alt="">
      </div>
    </div>
  </div>
  <table>
    @php
    $dir_path = public_path() . '/'.$cases->images.'/images';
    $files = array();
foreach (new DirectoryIterator($dir_path) as $fileInfo) {
    if($fileInfo->isDot() || !$fileInfo->isFile()) continue;
    $files[] = $fileInfo->getFilename();
}
    foreach (array_chunk($files,2) as $dirr) {
    echo '<tr>';
      foreach ($dirr as $fileinfo) {
    
      echo '<td> <img  src="'.public_path(''.$cases->images.'/images/'.$fileinfo).'" width="350px">
      </td>';
 
      }
      echo '</tr>';
    }
    @endphp
  </table>
</body>
<style>
  table {
    border-collapse: separate;
    font-family: arial, sans-serif;
  }

  td {
    border: 1px solid #000000;
    padding: 5px;
  }

  th {
    border-top: 1px solid black;
    border-bottom: 1px solid black;
    padding: 4px;
    border-left: 1px solid black;
    border-right: 1px solid black
  }

  .container,
  .container-fluid,
  .container-lg,
  .container-md,
  .container-sm,
  .container-xl,
  .container-xxl {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5);
    margin-right: auto;
    margin-left: auto;
  }

  .row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-.5 * var(--bs-gutter-x));
    margin-left: calc(-.5 * var(--bs-gutter-x));
  }


  .col-md-6 {

    display: flex;
  }

  @page {
    margin: 3px;
  }

  body {
    margin: 3px;
  }
</style>

</html>