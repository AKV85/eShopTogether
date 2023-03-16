@extends('auth.layouts.master')

@section('title', 'Savybės variantas ' . $propertyOption->name)

@section('content')
    <div class="col-md-12">
        <h1>Savybės variantas {{ $propertyOption->name }}</h1>
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
                <td>{{ $propertyOption->id }}</td>
            </tr>
            <tr>
                <td>Reikšmė</td>
                <td>{{ $propertyOption->property->name }}</td>
            </tr>
            <tr>
                <td>Pavadinimas</td>
                <td>{{ $propertyOption->name }}</td>
            </tr>
            <tr>
                <td>Pavadinimas en</td>
                <td>{{ $propertyOption->name_en }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
