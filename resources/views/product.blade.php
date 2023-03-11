@extends('layouts.main')

@section('title', 'Preke')

@section('content')
    <div class="thumbnail">
    <h1>{{$product->name}}</h1>
    <h2>{{$product->category->name}}</h2>
    <p>Kaina: <b>{{$product->price}} Eur</b></p>
    <img src="{{ Storage::url($product->image) }}" alt="{{$product->name}}">
    <h2>Aprasymas:{{$product->description}}</h2>
    @if($product->isAvailable())
        <form action="{{ route('basket-add', $product) }}" method="POST">
            <button type="submit" class="btn btn-primary" role="button">I krepseli</button>
            @else
                <p>Siuo metu nera. Kreiptis tiesiogiai i dizainere del uzsakymo tel.nr. +37065487123<p>
                    @endif
                    <a href="{{ route('allproducts')}}" class="btn btn-default"
                       role="button">Atgal</a>
                @csrf
        </form>
    </div>
        @endsection
