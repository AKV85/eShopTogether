@extends('auth.layouts.master')

@section('title', 'Каtegorijos')

@section('content')
    <div class="col-md-12">
        <h1>Kategorijos</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Кodas
                </th>
                <th>
                    Pavadinimas
                </th>
                <th>
                    Veiksmai
                </th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('categories.show', $category) }}">Atidaryti</a>
                                <a class="btn btn-warning" type="button" href="{{ route('categories.edit', $category) }}">Redaguoti</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Pašalinti"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button"
           href="{{ route('categories.create') }}">Pridėti kategoriją</a>
    </div>
@endsection
