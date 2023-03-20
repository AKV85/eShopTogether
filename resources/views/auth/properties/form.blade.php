@extends('auth.layouts.master')

@isset($property)
    @section('title', 'Redaguoti ' . $property->name)
@else
    @section('title', 'Sukurti')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($property)
            <h1>Redaguoti<b>{{ $property->name }}</b></h1>
        @else
            <h1>Prideti</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($property)
                  action="{{ route('properties.update', $property) }}"
              @else
                  action="{{ route('properties.store') }}"
            @endisset
        >
            <div>
                @isset($property)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="name" class="col-sm-4 col-form-label">Pavadinimas: </label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($property){{ $property->name }}@endisset">
                    </div>
                </div>

                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-4 col-form-label">Pavadinimas en: </label>
                    <div class="col-sm-6">
                        @error('name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name_en" id="name_en"
                               value="@isset($property){{ $property->name_en }}@endisset">
                    </div>
                </div>

                <button class="btn btn-success">Išsaugoti</button>
            </div>
        </form>
    </div>
@endsection

