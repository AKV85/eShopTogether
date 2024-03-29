@extends('auth.layouts.master')

@section('title', 'Каtegorija ' . $category->name)

@section('content')
    <div class="col-md-12">
        <h1>Kategorija {{ $category->name }}</h1>
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
                <td>Pavadinimas en</td>
                <td>{{ $category->name_en }}</td>
            </tr>
            <tr>
                <td>Apibūdinimas</td>
                <td>{{ $category->description }}</td>
            </tr>
            <td>Apibūdinimas en</td>
            <td>{{ $category->description_en }}</td>
            </tr>
            <tr>
                <td>Paveikslėlis</td>
                <td><img src="{{ Storage::url($category->image) }}"
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
