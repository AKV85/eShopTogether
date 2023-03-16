<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('main.online_shop'): @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/layout.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/startCss.css" rel="stylesheet">
</head>
<body class="@yield('background', 'main')">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('index') }}">@lang('main.online_shop')</a>
{{--            Šis kodas naudoja Laravel kalbos lokalizavimo funkciją, kad paimtų vertimą iš kalbos failo.
 @lang('main.online_shop') reiškia, kad jis bando gauti vertimą žodžiui "online_shop" iš "main" kalbos failo.
  Jei šiame failoje yra žodis "online_shop" su reikšme, tai jis bus grąžintas atgal į šį kodą. Jei kalbos faile tokio
   žodžio nėra, jis sugeneruos klaidą.--}}
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @routeactive('allproducts')><a href="{{ route('allproducts') }}">{{__('main.all_products')}}</a></li>
                <li @routeactive('categor*')><a href="{{ route('categories') }}">@lang('main.categories')</a>
                </li>
                <li @routeactive('basket*')><a href="{{ route('basket') }}">@lang('main.cart')</a></li>
                <li><a href="{{ route('locale', __('main.set_lang')) }}">{{__('main.set_lang')}}</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{ route('login') }}">@lang('main.login')</a></li>
                    <li><a href="{{ route('register') }}">@lang('main.register')</a></li>
                @endguest

                @auth
                    @admin
                    <li><a href="{{ route('home') }}">@lang('main.admin_panel')</a></li>
                    @else
                        <li><a href="{{ route('person.orders.index') }}">@lang('main.my_orders')</a></li>
                        @endadmin
                        <li><form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
{{--                                    {{ __('Log Out') }}--}}
                                    @lang('main.logout')
                                </button>
                            </form></li>

                @endauth
            </ul>

        </div>
    </div>

</nav>


<div class="container">
    <div class="starter-template">
        @if(session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @endif
        @if(session()->has('warning'))
            <p class="alert alert-warning">{{ session()->get('warning') }}</p>
        @endif
        @yield('content')
    </div>
</div>
</body>
</html>
