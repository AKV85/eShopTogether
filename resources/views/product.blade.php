@extends('layouts.main')

@section('title', 'Preke')

@section('content')
    <h1>Preke</h1>
    <h2>{{$product}}</h2>
    <p>Kaina: <b>Nemokamai</b></p>
    <img src="http://eShopForEveryone.lt/storage/products/vyr.kepure">
    <p>Aprasymas</p>
    <form action="{{ route('basket-add', $product) }}" method="POST">
        <button type="submit" class="btn btn-primary" role="button">I krepseli</button>
        <a href="{{ route('index')}}" class="btn btn-default"
           role="button">Placiau</a>
        @csrf
    </form>
@endsection
