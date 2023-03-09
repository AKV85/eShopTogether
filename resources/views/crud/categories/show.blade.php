<?php


@section('content')
    <h1>{{('categories.category')}}</h1>

    <input type="text" name="name" placeholder="{{('categories.name')}}" value="{{$category->name}}"><br>
    <input type="text" name="code" placeholder="{{('categories.code')}}" value="{{$category->code}}"><br>
    <input type="text" name="description" placeholder="{{('categories.description')}}" value="{{$category->description}}"><br>
    <input type="text" name="image" placeholder="{{('categories.image')}}" value="{{$category->image}}"><br>

@endsection

