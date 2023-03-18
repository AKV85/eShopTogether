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
                    <label for="name" class="col-sm-2 col-form-label">Pavadinimas: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'name'])
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($product){{ $product->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name_en" class="col-sm-2 col-form-label">Pavadinimas EN: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'name_en'])
                        <input type="text" class="form-control" name="name_en" id="name_en"
                               value="@isset($product){{ $product->name_en }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Kodas: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'code'])
                        <input type="text" class="form-control" name="code" id="code"
                               value="@isset($product){{ $product->code }}@endisset">
                    </div>
                </div>
                <br>

                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Kategorija: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'category_id'])
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
                        @include('auth.layouts.error', ['fieldName' => 'description'])
                        <textarea name="description" id="description" cols="72"
                                  rows="7">@isset($product)
                                {{ $product->description }}
                            @endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description_en" class="col-sm-2 col-form-label">Apibūdinimas EN: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'description_en'])
                        <textarea name="description_en" id="description_en" cols="72"
                                  rows="7">@isset($product)
                                {{ $product->description_en }}
                            @endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="image" class="inline-block text-lg mb-2"
                    >Paveiksliukas
                    </label>
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        @error('image') is-invalid @enderror
                        name="image"
                        id="image"
                        value="{{old('image')}}"/>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                    @enderror
                </div>
                {{--                <div class="input-group row">--}}
                {{--                    <label for="image" class="col-sm-2 col-form-label">paveiksliukas: </label>--}}
                {{--                    <div class="col-sm-10">--}}
                {{--                        <label class="btn btn-default btn-file">--}}
                {{--                            Uzkrauti <input type="file" style="display: none;" name="image" id="image">--}}
                {{--                        </label>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <br>

                    <div class="input-group row">
                        <label for="category_id" class="col-sm-2 col-form-label">Prekes savybes: </label>
                        <div class="col-sm-6">
                            @include('auth.layouts.error', ['fieldName' => 'property_id[]'])
                            <select name="property_id[]" multiple>
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}"
                                            @isset($product)
                                                @if($product->properties->contains($property->id))
                                                    selected
                                        @endif
                                        @endisset
                                    >{{ $property->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @foreach ([
           'hit' => 'Hitas',
           'new' => 'Naujiena',
           'recommend' => 'Rekomenduojame'
           ] as $field => $title)
                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">{{ $title }}: </label>
                        <div class="col-sm-10">
                            <input type="checkbox" name="{{$field}}" id="{{$field}}"
                                   @if(isset($product) && $product->$field === 1)
                                       checked="checked"
                                @endif
                            >
                        </div>
                    </div>
                    <br>
                @endforeach


                <button class="btn btn-success">Išsaugoti</button>

            </div>
        </form>
    </div>
@endsection
