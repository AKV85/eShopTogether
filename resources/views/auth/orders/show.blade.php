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
                        @foreach ($skus as $sku)
                            <tr>
                                <td>
                                    <a href="{{ route('sku', [$sku->product->category->code, $sku->product->code]) }}">
                                        <img height="56px alt={{$sku->product->name}}"
                                             src="{{ Storage::url($sku->product->image) }}">
                                        {{ $sku->product->name }}
                                    </a>
                                </td>
                                <td><span class="badge"> {{ $sku->pivot->count }}</span></td>
                                <td>{{ $sku->pivot->price }} {{ $order->currency->symbol }}</td>
                                <td>{{ $sku->pivot->price * $sku->pivot->count }} Eur.</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Bendra Kaina:</td>
                            <td>{{ $order->sum }} Eur </td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
