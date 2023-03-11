<p>Gerbiamas(oji) {{ $name }}</p>

<p>Jusu uzsakymo suma {{ $fullSum }}. Uzsakymas patvirtintas.</p>

<table class="table table-striped">
    <thead>
    <tr>
        <th>Pavadinimas</th>
        <th>Aprasymas</th>
        <th>Kaina</th>
        <th>Kiekis</th>
        <th>Kaina uz kiekius</th>
    </tr>
    </thead>
    <tbody>
    <tbody>
    @foreach($order->products as $product)
    <tr>
        <td>
            <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                <img height="56px" src="{{ Storage::url($product->image) }}">
                {{ $product->name }}
            </a>
        </td>
        <td>
            <div class="btn-group form-inline">
                {!! $product->description !!}
            </div>
        </td>
        <td>  {{ $product->price }} Eur</td>
        <td> {{ $product->pivot->count }}</td>
        <td> {{ $product->getPriceForCount() }} Eur</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3">Bendra Kaina:</td>
        <td>{{ $order->getFullSum() }} Eur</td>
    </tr>
    </tbody>
</table>

