<div class="row">
    <div class="col s12">
        <h1>Orders</h1>
        <a href="{{route('orders.create')}}" class="btn btn-primary">Create</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Sukurtas</th>
                <th>Atnaujintas</th>
                <th>Veiksmai</th>

            </tr>            </thead>
            <tbody>            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->updated_at}}</td>
                    <td>
                        <a> href="{{route('orders.edit', $order->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('orders.destroy', $order->id)}}" method="post">
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

