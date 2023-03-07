
@extends('main')

@section('title', 'Preke')

@section('content')

    <div class="starter-template">
        <h1>Vyr.kepure</h1>
        <h2>{{$product}}</h2>
        <p>Kaina: <b>7 Eur</b></p>
        <img src="http://eShopForEveryone.lt/storage/products/vyr.kepure">
        <p>Puikiai prie galvos priglundanti kepure</p>
        <a class="btn btn-success" href="/basket/1/add">I krepseli</a>
    </div>
</div>
@endsection
