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
                        <input type="text" class="form-control" name="code" id="code"
                               value="@isset($category){{ $category->code }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Pavadinimas: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($category){{ $category->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Apibūdinimas: </label>
                    <div class="col-sm-6">
							<textarea name="description" id="description" cols="72"
                                      rows="7">@isset($category){{ $category->description }}@endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Paveikslėlis: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Parsisiųsti
                            <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <button class="btn btn-success">Išsaugoti</button>
            </div>
        </form>
    </div>
@endsection

