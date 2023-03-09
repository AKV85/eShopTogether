@extends('auth.layouts.master')

@section('title', 'Uzsakymai')

@section('content')
    <div class="col-md-12">
        <h1>Uzsakymai</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Vardas
                </th>
                <th>
                    Telefonas
                </th>
                <th>
                    Kada issiustas
                </th>
                <th>
                    Suma
                </th>
                <th>
                    Veiksmai
                </th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $order->getFullPrice() }} Eur </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-success" type="button"
                               @admin
                               href="{{ route('orders.show', $order) }}"
                               @else
                                   href="{{ route('person.orders.show', $order) }}"
                               @endadmin
                            >Atidaryti</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
