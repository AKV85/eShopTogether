@extends('auth.layouts.master')

@section('title', 'Tiekejas ' . $merchant->name)

@section('content')
    <div class="col-md-12">
        <h1>Tiekejas {{ $merchant->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Laukas
                </th>
                <th>
                    Verte
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $merchant->id }}</td>
            </tr>
            <tr>
                <td>Pavadinimas</td>
                <td>{{ $merchant->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $merchant->email }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
