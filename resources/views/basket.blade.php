@extends('main')

@section('title', 'Krepselis')

@section('content')
    <div class="starter-template">
        <h1>Krepselis</h1>
        <p>Uzsakyti</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Pavadinimas</th>
                    <th>Kiekis</th>
                    <th>Kaina</th>
                    <th>Bendra kaina</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                                <img height="56px" src="http://eShopForEveryone/storage/products/kepure1">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td><span class="badge">1</span>
                            <div class="btn-group">
                                <a type="button" class="btn btn-danger"
                                   href="/basket/1/remove"><span
                                        class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                                <form action="{{ route('basket-add', $product) }}" method="POST">
                                    <button type="submit" class="btn btn-success"
                                            href=""><span
                                            class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td>{{ $product->price }} Eur</td>
                        <td>{{ $product->price }} Eur</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Bendra Kaina:</td>
                    <td>14 Eur</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="/basket/place">Uzsakyti</a>
            </div>
        </div>
    </div>
@endsection
