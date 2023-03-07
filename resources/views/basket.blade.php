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
                <tr>
                    <td>
                        <a href="/">
                            <img height="56px" src="http://eShopForEveryone/storage/products/kepure1">
                            Kepuraite
                        </a>
                    </td>
                    <td><span class="badge">1</span>
                        <div class="btn-group">
                            <a type="button" class="btn btn-danger" href="/basket/1/remove"><span
                                    class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                            <a type="button" class="btn btn-success" href="/basket/1/add"><span
                                    class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        </div>
                    </td>
                    <td>7 Eur</td>
                    <td>7 Eur</td>
                </tr>
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
