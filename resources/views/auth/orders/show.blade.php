@extends('auth.layouts.master')

@section('title', 'Uzsakymas ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Uzsakymo nr.{{ $order->id }}</h1>
                    <p>Uzsakovas: <b>{{ $order->name }}</b></p>
                    <p>Telefono numeris: <b>{{ $order->phone }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Pavadinimas</th>
                            <th>Kiekis</th>
                            <th>Kaina</th>
                            <th>Bendra</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                                        <img height="56px alt={{$product->name}}"
                                             src="{{ Storage::url($product->image) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td><span class="badge">1</span></td>
                                <td>{{ $product->price }} Eur</td>
                                <td>{{ $product->getPriceForCount()}} Eur </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Bendra Kaina:</td>
                            <td>{{ $order->calculateFullSum() }} Eur </td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
