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
                <td><img src="{{ Storage::url($product->image) }}" height="240px"></td>
            </tr>
            <tr>
                <td>Kategorija</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <td>Leiblai</td>
                <td>
                    @if($product->isNew())
                        <span class="badge badge-success">Naujiena</span>
                    @endif

                    @if($product->isRecommend())
                        <span class="badge badge-warning">Rekomenduojama</span>
                    @endif

                    @if($product->isHit())
                        <span class="badge badge-danger">Sezono hitas!</span>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
