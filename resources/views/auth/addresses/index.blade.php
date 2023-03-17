@extends('auth.layouts.master')

@section('title', 'Adresai')

@section('content')

    <div class="row">
    <div class="col s12">
        <h1>Addresses</h1>
        <a href="{{route('addresses.create')}}" class="btn btn-primary">Create</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>country</th>
                <th>city</th>
                <th>zip</th>
                <th>street</th>
                <th>house_number</th>
                <th>apartment_number</th>
                <th>state</th>
                <th>type</th>
                <th>additional_info</th>
                <th>user_id</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ($addresses as $address)

                    <td>{{$address->id}}</td>
                    <td>{{$address->name}}</td>
                    <td>{{$address->country}}</td>
                    <td>{{$address->city}}</td>
                    <td>{{$address->zip}}</td>
                    <td>{{$address->house_number}}</td>
                    <td>{{$address->apartment_number}}</td>
                    <td>{{$address->state}}</td>
                    <td>{{$address->type}}</td>
                    <td>{{$address->additional_info}}</td>
                    <td>{{$address->user_id}}</td>
                    <td>{{$address->created_at}}</td>
                    <td>{{$address->updated_at}}</td>
                    <td>
                        <a> href="{{route('addresses.edit', $address->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('addresses.destroy', $address->id)}}" method="post">
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
