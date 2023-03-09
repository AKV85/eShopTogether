<?php


@section('title', __('categories.category'))

@section('content')
    <h1>{{__('categories.category')}}</h1>

    <form action="{{route('categories.store')}}" method="post">
        <input type="text" name="name" placeholder="{{__('categories.name')}}" value="{{old('name')}}"><br>
        <input type="text" name="code" placeholder="{{__('categories.code')}}" value="{{old('code')}}"><br>
        <input type="text" name="description" placeholder="{{__('categories.description')}}" value="{{old('description')}}"><br>
        <input type="text" name="image" placeholder="{{__('categories.image')}}" value="{{old('image')}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection

