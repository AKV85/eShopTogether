<?php

@section('content')
    <h1>{{('orders.order')}}</h1>
    <input type="text" name="user_id" placeholder="{{('orders.user_id')}}" value="{{$order->user_id}}"><br>
    <input type="text" name="status" placeholder="{{('orders.status')}}" value="{{$order->status}}"><br>
    <input type="text" name="name" placeholder="{{('orders.name')}}" value="{{$order->name}}"><br>
    <input type="text" name="phone" placeholder="{{('orders.phone')}}" value="{{$order->phone}}"><br>
@endsection
