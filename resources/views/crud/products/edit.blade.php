<h1>Editing {{$product->name}}</h1>
<span>Redagavimo forma</span>
<form action="{{route('$products.update',$product->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <input type="text" name="category_id" placeholder="Category_id" value="{{$product->category_id}}"><br>
    <input type="text" name="name" placeholder="Name" value="{{$product->name}}"><br>
    <input type="text" name="code" placeholder="Code" value="{{$product->code}}"><br>
    <input type="text" name="description" placeholder="Description" value="{{$product->description}}"><br>
    <input type="file" name="image" placeholder="image" value="{{$product->image}}"><br>
    <input type="text" name="price" placeholder="Price" value="{{$product->price}}"><br>
       <hr>
    <input type="submit" class="waves-effect waves-light btn" value="Atnaujinti">
    @csrf
</form>

