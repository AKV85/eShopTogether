<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            @if($product->isNew())
                <span class="badge badge-success">Naujiena</span>
            @endif

            @if($product->isRecommend())
                <span class="badge badge-warning">Rekomenduojame</span>
            @endif

            @if($product->isHit())
                <span class="badge badge-danger">Perkamiausi!</span>
            @endif
        </div>
        <img src="{{ Storage::url($product->image) }}" alt="iPhone X 64GB">
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
            </p>>
        </div>
    </div>
</div>
