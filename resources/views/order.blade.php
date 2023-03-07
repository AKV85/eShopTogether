@extends('layouts.main')

@section('title', 'Pabaigti uzsakyma')

@section('content')
    <h1>Patvirtinti uzsakyma:</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>Bendra kaina: <b>{{ $order->getFullPrice() }} Eur</b></p>
            <form action="{{ route('basket-confirm', $order) }}" method="POST">
                <div>
                    <p>Palikite savo varda ir tel.numeri kad menedzeris galetu su jumis susisiekti:</p>

                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Vardas:
                            </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Telefono
                                numeris:
                            </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="_token" value="qhk4riitc1MAjlRcro8dvWchDTGkFDQ9Iacyyrkj">
                    <br>
                    @csrf
                    <input type="submit" class="btn btn-success" value="Patvirtinti uzsakyma">
                </div>
            </form>
        </div>
    </div>
@endsection
