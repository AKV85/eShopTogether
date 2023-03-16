{{__('mail.subscription.dear_client')}} {{ $product->__('name') }} {{__('mail.subscription.appeared_in_stock')}}.

<a href="{{ route('product', [$product->category->code, $product->code]) }}">{{__('mail.subscription.more_info')}}</a>
