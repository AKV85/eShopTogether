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
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @isset($product)
                                            @if($product->category_id == $category->id)
                                                selected
                                    @endif
                                    @endisset
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Apibūdinimas: </label>
                    <div class="col-sm-6">
								<textarea name="description" id="description" cols="72"
                                          rows="7">@isset($product)
                                        {{ $product->description }}
                                    @endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="mb-6">
                    <label for="image" class="inline-block text-lg mb-2"
                    >Paveiksliukas</label
                    >
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="image"
                        value="{{old('image')}}"/>
                </div>
                <br>
                <div class="mb-6">
                    <label
                        for="price"
                        class="inline-block text-lg mb-2">
                        Kaina</label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="price"
                        placeholder="1"
                        value="@isset($product){{ $product->price }}@endisset">

                    @error('price')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                    <button class="btn btn-success">Išsaugoti</button>

            </div>
        </form>
    </div>
@endsection
