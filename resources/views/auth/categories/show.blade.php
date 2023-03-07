@extends('auth.layouts.master')

@section('title', 'Каtegorija ' . $category->name)

@section('content')
    <div class="col-md-12">
        <h1>Prekės</h1>
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
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Коdas</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>Pavadinimas</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Apibūdinimas</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Paveikslėlis</td>
                <td><img src="http://laravel-diplom-1.rdavydov.ru/storage/categories/appliance.jpg"
                         height="240px"></td>
            </tr>
            <tr>
                <td>Prekių skaičius</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
