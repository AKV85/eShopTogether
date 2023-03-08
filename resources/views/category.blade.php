@extends('layouts.main')

@section('title', 'Kategorijos '. $category->name))
@section('background', 'kategorijos')
@section('content')
    <h1>
        {{$category->name}} {{ $category->products->count() }}
    </h1>
    <p>
        {{ $category->description }}
    </p>
    <div class="row">
        @foreach($category->products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>
@endsection
