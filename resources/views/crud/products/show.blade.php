<!-- Pridėti produktą į krepšelį mygtukas -->
<form action="{{ route('cart.store') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id">
    <input type="hidden" name="category_id">
    <input type="hidden" name="product_name">
    <input type="hidden" name="product_code">
    <input type="hidden" name="product_description">
    <input type="hidden" name="product_image">
    <input type="hidden" name="product_price">

    <button type="submit">Pridėti į krepšelį</button>
</form>
<!-- Produktų krepšelio mygtukai -->
<form action="{{ route('cart.update', $product->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="product_quantity" value="1">
    <button type="submit">Padidinti kiekį</button>
</form><form action="{{ route('cart.update', $product->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="product_quantity" value="-1">
    <button type="submit">Sumažinti kiekį</button>
</form><form action="{{ route('cart.destroy', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Ištrinti produktą</button>
</form>

