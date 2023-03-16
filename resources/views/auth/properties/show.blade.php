@extends('auth.layouts.master')

@section('title', ' Savybės' . $property->name)

@section('content')
    <div class="col-md-12">
        <h1>Savybės {{ $property->name }}</h1>
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
                <td>{{ $property->id }}</td>
            </tr>
            <tr>
                <td>Pavadinimas</td>
                <td>{{ $property->name }}</td>
            </tr>
            <tr>
                <td>Pavadinimas en</td>
                <td>{{ $property->name_en }}</td>
            </tr>
            {{--            <tr>--}}
            {{--                <td>Prekių skaičius</td>--}}
            {{--                <td>{{ $property->products->count() }}</td>--}}
            {{--            </tr>--}}
            </tbody>
        </table>
    </div>
@endsection
