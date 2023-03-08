<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Internetine parduotuve: @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/startCss.css" rel="stylesheet">
</head>
<body class="@yield('background', 'main')">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('index') }}">AKS Design</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('allproducts') }}">Visos prekes</a></li>
                <li><a href="{{ route('categories') }}">Kategorijos</a>
                </li>
                <li><a href="{{ route('basket') }}">I krepseli</a></li>
                <li><a href="{{ route('index') }}">Kazkas dar :)</a></li>
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