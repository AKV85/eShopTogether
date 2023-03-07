<?php



@section('content')
    <h1>{{('categories.category_edit')}}</h1>
    <form action="{{route('categories.update', $category)}}" method="post">

        <input type="text" name="name" placeholder="{{('categories.name')}}"
               value="{{old('name') ?? $category->name}}"><br>
        <input type="text" name="code" placeholder="{{('categories.code')}}"
               value="{{old('code') ?? $category->code}}"><br>
        <input type="text" name="description" placeholder="{{('categories.description')}}"
               value="{{old('description') ?? $category->description}}"><br>
        <input type="text" name="image" placeholder="{{('categories.image')}}"
               value="{{old('image') ?? $category->image}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection

