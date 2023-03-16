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
    @foreach($order->products as $product)
    <tr>
        <td>
            <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                <img height="56px" src="{{ Storage::url($product->image) }}">
                {{ $product->__('name') }}
            </a>
        </td>
        <td>
            <div class="btn-group form-inline">
                {!! $product->__('description')  !!}
            </div>
        </td>
        <td>  {{ $product->price }} {{__('main.eur')}}.</td>
        <td> {{ $product->pivot->count }}</td>
        <td> {{ $product->getPriceForCount() }} {{__('main.eur')}}.</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3">{{__('mail.total')}}:</td>
        <td>{{ $order->getFullSum() }} {{__('main.eur')}}.</td>
    </tr>
    </tbody>
</table>

