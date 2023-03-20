@extends('layouts.main')

@section('title', __('main.about'))

@section('content')
     <body onload="digitalWatch()">


    <p id="digital_watch" style="color: #f00; font-size: 120%; font-weight: bold;"></p>

   <div style="font-size: 45px; color: #110f0f; padding-bottom: 20px">
       <div class="card mb-3">
           <div id="result"></div>

           <div class="card-body">


           </div>
       </div>
    </div>
    </body>
@endsection
