<?php

@section('content')
    <h1>{{('categories.order_edit')}}</h1>
    <form action="{{route('orders.update', $order)}}" method="post">
        @method('PUT')

        <input type="text" name="status" placeholder="{{('orders.status')}}" value="{{old('status') ?? $order->status}}"><br>
        <input type="text" name="name" placeholder="{{('orders.name')}}" value="{{old('name') ?? $order->name}}"><br>
        <input type="text" name="phone" placeholder="{{('orders.phone')}}" value="{{old('phone') ?? $order->phone}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="SEND">
        @csrf
    </form>
@endsection

