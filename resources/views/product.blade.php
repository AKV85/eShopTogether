@extends('layouts.main')

@section('title', __('main.product'))

@section('content')
    <div class="thumbnail">
        <h1>{{$sku->product->__('name')}}</h1>
        <h2>{{$sku->product->category->__('name')}}</h2>
        <p>@lang('product.price'): <b>{{$sku->price}}  @lang('main.eur')</b></p>
        @isset($sku->product->properties)
            @foreach ($sku->propertyOptions as $propertyOption)
                <h4>{{ $propertyOption->property->__('name') }}: {{ $propertyOption->__('name') }}</h4>
            @endforeach
        @endisset
        <img src="{{ Storage::url($sku->product->image) }}" alt="{{$sku->product->__('name')}}">
        <h2>{{__('main.description')}} : {{$sku->product->__('description')}}</h2>


        <form action="{{ route('basket-add', $sku) }}" method="POST">
        @if($sku->isAvailable())
                <button type="submit" class="btn btn-primary" role="button">@lang('product.add_to_cart')</button>
            @else
                <span>@lang('product.not_available')</span>
            @endif

                <a href="{{ route('allproducts')}}" class="btn btn-default"
                   role="button">@lang('product.back')</a>
            @csrf

        </form>

            <br>
            <span>@lang('product.tell_me'):</span>
            <div class="warning">
                @if($errors->get('email'))
                    {!! $errors->get('email')[0] !!}
                @endif
            </div>
            <form method="POST" action="{{ route('subscription', $sku) }}">
                @csrf
                <input type="text" name="email">
                <button type="submit">@lang('product.subscribe')</button>
            </form>
    </div>
@endsection
