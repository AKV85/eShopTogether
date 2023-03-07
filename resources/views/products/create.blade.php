<h1>Editing</h1>
<span>Redagavimo forma</span>
<form action="{{route('products.store')}}" method="post">

    <input type="text" name="category_id" placeholder="Category_id"><br>
    <input type="text" name="name" placeholder="Name"><br>
    <input type="text" name="code" placeholder="Code"><br>
    <input type="text" name="description" placeholder="Description"><br>
    <input type="file" name="image" placeholder="Image"><br>
    <input type="text" name="price" placeholder="Price"><br>
        <hr>
    <input type="submit" class="Atnaujinti">
    @csrf
</form>



