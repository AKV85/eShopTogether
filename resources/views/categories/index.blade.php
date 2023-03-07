<?php

@section('content')
    <h1>{{('categories.category_list')}}</h1>
    <a href="{{route('categories.create')}}" class="waves-effect waves-light btn">{{('categories.add_new')}}</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>{{('categories.name')}}</th>
            <th>{{('categories.code')}}</th>
            <th>{{('categories.description')}}</th>
            <th>{{('categories.image')}}</th>
            <th>{{('messages.created_at')}}</th>
            <th>{{('messages.updated_at')}}</th>
            <th>{{('messages.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><img src="{{$category->image}}" alt="{{$category->name}}" width="100"></td>
                <td>{{$category->name}}</td>
                <td>{{$category->code}}</td>

                <td>{{$category->description}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    @include('layouts.admin.list_actions_buttons', ['modelObject' => $category, 'mainRoute' => 'categories'])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

