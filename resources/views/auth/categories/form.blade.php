@extends('auth.layouts.master')

@isset($category)
    @section('title', 'Redaguoti kategoriją  ' . $category->name)
@else
    @section('title', 'Sukurti kategoriją')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($category)
            <h1> Redaguoti kategoriją<b>{{ $category->name }}</b></h1>
        @else
            <h1>Prideti kategoriją</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($category)
                  action="{{ route('categories.update', $category) }}"
              @else
                  action="{{ route('categories.store') }}"
            @endisset
        >
            <div>
                @isset($category)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Kodas: </label>
                    <div class="col-sm-6">
                        @error('code')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{ old('code', isset($category) ? $category->code : null) }}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Pavadinimas: </label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($category){{ $category->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Pavadinimas en: </label>
                    <div class="col-sm-6">
                        @error('name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name_en" id="name_en"
                               value="@isset($category){{ $category->name_en }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Apibūdinimas: </label>
                    <div class="col-sm-6">
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <textarea name="description" id="description" cols="72"
                                  rows="7">@isset($category)
                                {{ $category->description }}
                            @endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Apibūdinimas en: </label>
                    <div class="col-sm-6">
                        @error('description_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <textarea name="description_en" id="description_en" cols="72"
                                  rows="7">@isset($category)
                                {{ $category->description_en }}
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

                    {{--                    <div class="input-group row">--}}
                    {{--                        <label for="name" class="col-sm-2 col-form-label">Pavadinimas: </label>--}}
                    {{--                        <div class="col-sm-6">--}}
                    {{--                            @include('auth.layouts.error', ['fieldName' => 'name'])--}}
                    {{--                            <input type="text" class="form-control" name="name" id="name"--}}
                    {{--                                   value="@isset($category){{ $category->name }}@endisset">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <br>--}}
                    {{--                    <div class="input-group row">--}}
                    {{--                        <label for="name_en" class="col-sm-2 col-form-label">Pavadinimas EN: </label>--}}
                    {{--                        <div class="col-sm-6">--}}
                    {{--                            @include('auth.layouts.error', ['fieldName' => 'name_en'])--}}
                    {{--                            <input type="text" class="form-control" name="name_en" id="name_en"--}}
                    {{--                                   value="@isset($category){{ $category->name_en }}@endisset">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <br>--}}
                    {{--                    <div class="input-group row">--}}
                    {{--                        <label for="code" class="col-sm-2 col-form-label">Kodas: </label>--}}
                    {{--                        <div class="col-sm-6">--}}
                    {{--                            @include('auth.layouts.error', ['fieldName' => 'code'])--}}
                    {{--                            <input type="text" class="form-control" name="code" id="code"--}}
                    {{--                                   value="@isset($category){{ $category->code }}@endisset">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <br>--}}
                    {{--                    <div class="input-group row">--}}
                    {{--                        <label for="description" class="col-sm-2 col-form-label">Apibūdinimas: </label>--}}
                    {{--                        <div class="col-sm-6">--}}
                    {{--                            @include('auth.layouts.error', ['fieldName' => 'description'])--}}
                    {{--                            <textarea name="description" id="description" cols="72"--}}
                    {{--                                      rows="7">@isset($category)--}}
                    {{--                                    {{ $category->description }}--}}
                    {{--                                @endisset</textarea>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <br>--}}
                    {{--                    <div class="input-group row">--}}
                    {{--                        <label for="description_en" class="col-sm-2 col-form-label">Apibūdinimas EN: </label>--}}
                    {{--                        <div class="col-sm-6">--}}
                    {{--                            @include('auth.layouts.error', ['fieldName' => 'description_en'])--}}
                    {{--                            <textarea name="description_en" id="description_en" cols="72"--}}
                    {{--                                      rows="7">@isset($category)--}}
                    {{--                                    {{ $category->description_en }}--}}
                    {{--                                @endisset</textarea>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <br>--}}
                    {{--                    <div class="form-group">--}}
                    {{--                        <label for="image" class="inline-block text-lg mb-2"--}}
                    {{--                        >Paveiksliukas--}}
                    {{--                        </label>--}}
                    {{--                        <input--}}
                    {{--                            type="file"--}}
                    {{--                            class="border border-gray-200 rounded p-2 w-full"--}}
                    {{--                            @error('image') is-invalid @enderror--}}
                    {{--                            name="image"--}}
                    {{--                            id="image"--}}
                    {{--                            value="{{old('image')}}"/>--}}
                    {{--                        @error('image')--}}
                    {{--                        <span class="invalid-feedback" role="alert">--}}
                    {{--                        <strong>{{ $message }}</strong>--}}
                    {{--                     </span>--}}
                    {{--                        @enderror--}}
                    {{--                    </div>--}}
                    <button class="btn btn-success">Išsaugoti</button>
                </div>
            </div>
        </form>
    </div>
@endsection

