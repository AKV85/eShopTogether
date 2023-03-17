@extends('auth.layouts.master')

@section('title', 'Asmenys')

@section('content')

<div class="row">
    <div class="col s12">
        <h1>Persons</h1>
        <a href="{{route('persons.create')}}" class="btn btn-primary">Create</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>surname</th>
                <th>email</th>
                <th>phone</th>
                <th>user</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($persons as $person)
                <tr>
                    <td>{{$person->id}}</td>
                    <td>{{$person->name}}</td>
                    <td>{{$person->surname}}</td>
                    <td>{{$person->email}}</td>
                    <td>{{$person->phone}}</td>
                    <td>{{$person->user?->name}}</td>
                    <td>
                        <a> href="{{route('persons.edit', $person->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('persons.destroy', $person->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
