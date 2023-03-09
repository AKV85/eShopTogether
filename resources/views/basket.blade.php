@extends('layouts.main')

@section('title', 'Krepselis')
@section('background', 'krepselis')
@section('content')
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
                            <img height="56px" src="{{ Storage::url($product->image) }}">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td><span class="badge">{{ $product->pivot->count }}</span>
                        <div class="btn-group form-inline">
                            <form action="{{ route('basket-remove', $product) }}" method="POST">
                                <button type="submit" class="btn btn-danger"
                                        href="">
                                    <span
                                        class="glyphicon glyphicon-minus" aria-hidden="true">
                                    </span>
                                </button>
                                @csrf
                            </form>
                            <form action="{{ route('basket-add', $product) }}" method="POST">
                                <button type="submit" class="btn btn-success"
                                        href="">
                                    <span
                                        class="glyphicon glyphicon-plus" aria-hidden="true">
                                    </span>
                                </button>
                                @csrf
                            </form>
                        </div>
                    </td>
                    <td>{{ $product->price }} Eur</td>
                    <td>{{ $product->getPriceForCount() }} Eur</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">Bendra Kaina:</td>
                <td>{{ $order->getFullPrice() }} Eur</td>
            </tr>
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{ route('basket-place') }}">Uzsakyti</a>
        </div>
    </div>
@endsection
