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

                <div class="mb-6">
                    <label for="image" class="inline-block text-lg mb-2"
                    >Paveiksliukas</label
                    >
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="image"
                        value="{{old('image')}}"/>
                    <button class="btn btn-success">Išsaugoti</button>
                </div>
            </div>
        </form>
    </div>
@endsection

