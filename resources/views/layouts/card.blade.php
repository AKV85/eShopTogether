
<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="{{ Storage::url($product->image) }}" alt="kepuraite">
        <div class="caption">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->price }} Eur</p>
            <p>
            <form action="{{ route('basket-add', $product) }}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">I krepseli</button>
                <a href="{{ route('product', [$product->category->code, $product->code]) }}" class="btn btn-default"
                   role="button">Placiau</a>
                @csrf
            </form>
            </p>
        </div>
    </div>
</div>
