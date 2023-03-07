@extends('main')

@section('title', 'Pabaigti uzsakyma')

@section('content')
    <div class="starter-template">
        <h1>Patvirtinti uzsakyma:</h1>
        <div class="container">
            <div class="row justify-content-center">
                <p>Bendra kaina: <b>52 Eur</b></p>
                <form action="/basket/accept" method="POST">
                    <div>
                        <p>Palikite savo numeri kad mededzeris galetu su jumis susisiekti:</p>

                        <div class="container">
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Vardas: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Telefono numeris: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="phone" id="phone" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="_token" value="qhk4riitc1MAjlRcro8dvWchDTGkFDQ9Iacyyrkj">					<br>
                        <input type="submit" class="btn btn-success" href="/basket/place" value="Patvirtinti uzsakyma">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
