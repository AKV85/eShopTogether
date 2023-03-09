@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Redaguoti prekę ' . $product->name)
@else
    @section('title', 'Sukurti prekę')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Redaguoti prekę <b>{{ $product->name }}</b></h1>
        @else
            <h1>Pridėti prekę</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
                  action="{{ route('products.update', $product) }}"
              @else
                  action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Kodas: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code"
                               value="@isset($product){{ $product->code }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Pavadinimas: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($product){{ $product->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Kategorija: </label>
                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="1"> Mergaiciu rūbai</option>
                            <option value="2">Berniukų rūbai</option>
                            <option value="3">Suaugusių rūbai</option>
                            <option value="4">Aksesuarai</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Apibūdinimas: </label>
                    <div class="col-sm-6">
								<textarea name="description" id="description" cols="72"
                                          rows="7">@isset($product){{ $product->description }}@endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Paveikslėlis: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Parsisiųsti <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">Kaina: </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="price" id="price"
                               value="@isset($product){{ $product->price }}@endisset">
                    </div>
                </div>
                <button class="btn btn-success">Išsaugoti</button>
            </div>
        </form>
    </div>
    @endsectionp
