@extends('layouts.main')

@section('title', 'Pagrindinis')
@section('background', 'produktai')
@section('content')
    <h1>Visos Prekes</h1>
    <form method="GET" action="{{route("allproducts")}}">
        <div class="filters row">
            <div class="col-sm-6 col-md-3">
                <label for="price_from">Kaina nuo
                    <input type="text" name="price_from" id="price_from" size="6" value="{{ request()->price_from}}">
                </label>
                <label for="price_to">iki
                    <input type="text" name="price_to" id="price_to" size="6"  value="{{ request()->price_to }}">
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="hit">
                    <input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif> Perkamiausi
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="new">
                    <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif> Naujiena
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="recommend">
                    <input type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif> Rekomenduojame
                </label>
            </div>
            <div class="col-sm-6 col-md-3">
                <button type="submit" class="btn btn-primary">Filtras</button>
                <a href="{{ route("allproducts") }}" class="btn btn-warning">Nuimti</a>
            </div>
        </div>
    </form>
    <div class="row">
        @foreach($products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>
    {{ $products->links('pagination::bootstrap-4')}}
@endsection

