@extends('auth.layouts.master')

@section('title', 'Prekės')

@section('content')
    <div class="col-md-12">
        <h1>Prekės</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Kodas
                </th>
                <th>
                    Pavadinimas
                </th>
                <th>
                    Kategorija
                </th>
                <th>
                    Kaina
                </th>
                <th>
                    Veiksmai
                </th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('products.show', $product) }}">Atidaryti</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('products.edit', $product) }}">Redaguoti</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Pašalinti"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links('pagination::bootstrap-4')}}
        <a class="btn btn-success" type="button" href="{{ route('products.create') }}">Pridėti prekę</a>
    </div>
@endsection
