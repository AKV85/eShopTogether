@extends('main')

@section('title', 'Pagrindinis')

@section('content')
    <div class="starter-template">
        <h1>Visos prekes</h1>

        <div class="row">
            @foreach($products as $product)
                @include('card', compact('product'))
            @endforeach
        </div>
    </div>
@endsection
