@extends('auth.layouts.master')

@section('title', 'Tiekejai')

@section('content')
    <div class="col-md-12">
        <h1>Tiekejai</h1>
        @if(session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @endif
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
                    Email
                </th>
                <th>
                    Veiksmai
                </th>
            </tr>
            @foreach($merchants as $merchant)
                <tr>
                    <td>{{ $merchant->id }}</td>
                    <td>{{ $merchant->name }}</td>
                    <td>{{ $merchant->email }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('merchants.destroy', $merchant) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('merchants.show', $merchant) }}">Paziureti</a>
                                <a class="btn btn-warning" type="button" href="{{ route('merchants.edit', $merchant) }}">Redaguoti</a>
                                <a class="btn btn-primary" type="button" href="{{ route('merchants.update_token', $merchant) }}">Atnaujinti tokena</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $merchants->links() }}
        <a class="btn btn-success" type="button"
           href="{{ route('merchants.create') }}">Prideti tiekeja</a>
    </div>
@endsection
