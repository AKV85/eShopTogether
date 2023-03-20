<p>{{__('mail.order_created.dear')}} {{ $name }}</p>

<p>{{__('mail.order_created.your_order')}} {{ $fullSum }} {{__('mail.order_created.created')}}</p>

<table class="table table-striped">
    <thead>
    <tr>
        <th>{{__('mail.name')}}</th>
        <th>{{__('mail.description')}}</th>
        <th>{{__('mail.price')}}</th>
        <th>{{__('mail.count')}}</th>
        <th>{{__('mail.total')}}</th>
    </tr>
    </thead>
    <tbody>
    <tbody>
    @foreach($order->skus as $sku)
        <tr>
            <td>
                <a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]) }}">
                    <img height="56px" src="{{ Storage::url($sku->product->image) }}">
                    {{ $sku->product->__('name') }}
                </a>
            </td>
            <td><span class="badge">{{ $sku->countInOrder }}</span>
                <div class="btn-group form-inline">
                    {!! $sku->product->__('description') !!}
                </div>
            </td>
            <td>{{ $sku->price }} Eur.</td>
            <td>{{ $sku->getPriceForCount() }} Eur.</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3">{{__('mail.total')}}:</td>
        <td>{{ $order->getFullSum() }} {{__('main.eur')}}.</td>
    </tr>
    </tbody>
</table>

