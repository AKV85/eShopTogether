Gerbiamas klientas, preke {{ $product->name }} atsirado musu perduotuvei.

<a href="{{ route('product', [$product->category->code, $product->code]) }}">Placiau</a>
