<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="/storage//menClothes/vyr.kepure" alt="kepuraite">
        <div class="caption">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->price }} Eur</p>
            <p>
                <a href="{{ route('basket') }}" class="btn btn-primary"
                   role="button">I krepseli</a>

                <a href="{{ route('product', [$product->category->code, $product->code]) }}" class="btn btn-default"
                   role="button">Placiau</a>
            </p>
        </div>
    </div>
</div>
