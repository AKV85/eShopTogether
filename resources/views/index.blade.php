@extends('layouts.main')

@section('title', 'Pagrindinis')

@section('content')
    <h1>Visos prekes</h1>
    <div class="row">
        @foreach($products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>
@endsection
