@extends('auth.layouts.master')

@section('title', 'Sku ' . $sku->name)

@section('content')
    <div class="col-md-12">
        <h1>Sku {{ $sku->product->name }}</h1>
        <h2>{{ $sku->propertyOptions->map->name->implode(', ') }}</h2>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Laukas
                </th>
                <th>
                    Reiksme
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $sku->id }}</td>
            </tr>
            <tr>
                <td>Kaina</td>
                <td>{{ $sku->price }}</td>
            </tr>
            <tr>
                <td>Kiekis</td>
                <td>{{ $sku->count }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
