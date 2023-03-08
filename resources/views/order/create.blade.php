<h1>Orders</h1>
<span>Order</span>

<form action="{{route('orders.store')}}" method="post">

    <input type="text" name="status" placeholder="{{('orders.status')}}" value="{{old('status')}}"><br>
    <input type="text" name="name" placeholder="{{('orders.name')}}" value="{{old('name')}}"><br>
    <input type="text" name="phone" placeholder="{{('orders.phone')}}" value="{{old('phone')}}"><br>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="SEND">
    @csrf
</form>

