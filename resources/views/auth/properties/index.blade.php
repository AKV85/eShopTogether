@extends('auth.layouts.master')

@section('title', 'Savybės')

@section('content')
    <div class="col-md-12">
        <h1>Savybės</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Pavadinimas
                </th>
                <th>
                    Veiksmai
                </th>
            </tr>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('properties.destroy', $property) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('properties.show', $property) }}">Atidaryti</a>
                                <a class="btn btn-warning" type="button" href="{{ route('properties.edit', $property) }}">Redaguoti</a>

                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Pašalinti "></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $properties->links() }}
        <a class="btn btn-success" type="button"
           href="{{ route('properties.create') }}">Pridėti savybę</a>
    </div>
@endsection
