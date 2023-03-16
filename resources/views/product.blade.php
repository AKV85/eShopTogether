@extends('layouts.main')

@section('title', __('main.product'))

@section('content')
    <div class="thumbnail">
        <h1>{{$product->__('name')}}</h1>
        <h2>{{$product->category->__('name')}}</h2>
        <p>@lang('product.price'): <b>{{$product->price}}  @lang('main.eur')</b></p>
        <img src="{{ Storage::url($product->image) }}" alt="{{$product->__('name')}}">
        <h2>{{__('main.description')}} : {{$product->__('description')}}</h2>
        @if($product->isAvailable())
            <form action="{{ route('basket-add', $product) }}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">@lang('product.add_to_cart')</button>
                @csrf
            </form>
        @else

            <span>@lang('product.not_available')</span>
            <br>
            <span>@lang('product.tell_me'):</span>
            <div class="warning">
                @if($errors->get('email'))
                    {!! $errors->get('email')[0] !!}
                @endif
            </div>
            <form method="POST" action="{{ route('subscription', $product) }}">
                @csrf
                <input type="text" name="email">
                <button type="submit">@lang('product.subscribe')</button>
            </form>
        @endif



                        <a href="{{ route('allproducts')}}" class="btn btn-default"
                           role="button">@lang('product.back')</a>
                    @csrf
    </div>
@endsection
