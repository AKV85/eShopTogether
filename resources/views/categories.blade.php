@extends('main')

@section('title', 'Visos kategorijos')

@section('content')
    <div class="starter-template">
        @foreach($categories as $category)
            <div class="panel">
                <a href="{{ route('category', $category->code) }}">
                    <img src="/storage/kazkas.jpg">
                    <h2>{{ $category->name }}</h2>
                </a>
                <p>
                    {{ $category->description }}
                </p>
            </div>
        @endforeach
    </div>
@endsection
