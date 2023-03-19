@extends('auth.layouts.master')

@isset($merchant)
    @section('title', 'Redaguoti tiekeja ' . $merchant->name)
@else
    @section('title', 'Kurti tiekeja')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($merchant)
            <h1>Redaguoti tiekeja <b>{{ $merchant->name }}</b></h1>
        @else
            <h1>Prideti tiekeja</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($merchant)
                  action="{{ route('merchants.update', $merchant) }}"
              @else
                  action="{{ route('merchants.store') }}"
            @endisset
        >
            <div>
                @isset($merchant)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Pavadinimas: </label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($merchant){{ $merchant->name }}@endisset">
                    </div>
                </div>

                <br>
                <div class="input-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email: </label>
                    <div class="col-sm-6">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="email" id="email"
                               value="@isset($merchant){{ $merchant->email }}@endisset">
                    </div>
                </div>

                <button class="btn btn-success">Saugoti</button>
            </div>
        </form>
    </div>
@endsection
