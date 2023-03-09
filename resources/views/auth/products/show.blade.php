@extends('auth.layouts.master')

@section('title', 'Produktas ' . $product->name)

@section('content')
    <div class="col-md-12">
        <h1>{{ $product->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Laukas
                </th>
                <th>
                    Reikšmė
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $product->id}}</td>
            </tr>
            <tr>
                <td>Kodas</td>
                <td>{{ $product->code }}</td>
            </tr>
            <tr>
                <td>Pavadinimas</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Apibūdinimas</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Paveikslėlis</td>
                <td><img src=/migtukas.jpg" height="240px"></td>
            </tr>
            <tr>
                <td>Kategorija</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
