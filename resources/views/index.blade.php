@extends('layouts.main')

@section('title', __('main.about'))

@section('content')
   <div style="font-size: 45px; color: #110f0f; padding-bottom: 20px">
       <div class="card mb-3">
           <img src="{{asset('images/aksLogo.jpg')}}" class="card-img-top" alt="logo">
           <div class="card-body">

               <p class="card-text"> {{__('about.main')}}</p>

           </div>
       </div>
    </div>
@endsection
