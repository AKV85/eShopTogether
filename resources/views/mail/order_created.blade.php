<p>@lang('mail.order_created.dear') {{ $name }}</p>

<p>@lang('mail.order_created.your_order') {{ $fullSum }} @lang('mail.order_created.created')</p>

<table class="table table-striped">
    <thead>
    <tr>
        <th>@lang('mail.name')</th>
        <th>@lang('mail.description')</th>
        <th>@lang('mail.price')</th>
        <th>@lang('mail.count')</th>
        <th>@lang('mail.total')</th>
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
        <td>  {{ $product->price }} @lang('main.eur').</td>
        <td> {{ $product->pivot->count }}</td>
        <td> {{ $product->getPriceForCount() }} @lang('main.eur').</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3">@lang('mail.total'):</td>
        <td>{{ $order->getFullSum() }} @lang('main.eur').</td>
    </tr>
    </tbody>
</table>

