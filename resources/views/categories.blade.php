@extends('layouts.main')

@section('title', 'Visos kategorijos')
@section('background', 'kategorija')
@section('content')
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
@endsection
