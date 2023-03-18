@extends('auth.layouts.master')

@section('title', 'Prekibiniai pasiulymai')

@section('content')
    <div class="col-md-12">
        <h1>Prekibiniai pasiulymai</h1>
        <h2>{{ $product->name }}</h2>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Prekibiniai pasiulymai (savybes)
                </th>
                <th>
                    Veiksmai
                </th>
            </tr>
            @foreach($skus as $sku)
                <tr>
                    <td>{{ $sku->id }}</td>
                    <td>{{ $sku->propertyOptions->map->name->implode(', ') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('skus.destroy', [$product, $sku]) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('skus.show', [$product, $sku]) }}">Atidaryti</a>
                                <a class="btn btn-warning" type="button" href="{{ route('skus.edit', [$product, $sku]) }}">Redaguoti</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $skus->links() }}
        <a class="btn btn-success" type="button"
           href="{{ route('skus.create', $product) }}">Sukurti Sku</a>
    </div>
@endsection
