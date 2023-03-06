<!doctype html>{{--Pirmoje eilutėje nurodoma HTML dokumento deklaracija.--}}
<html lang="en">
<head>
    {{--nurodomi pagrindiniai HTML dokumento elementai - <head> ir <body>.--}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<meta> elementai nurodo informaciją apie HTML dokumento charakteristikas - koduotę, suderinamumą
    su Internet Explorer, dydžio prisitaikymą ir kt.--}}
    <title>E-shop drabuziu parduotuve</title>
    {{--<title> elementas nurodo puslapio pavadinimą, kuris bus rodomas naršyklės skirtuke.--}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/startCss.css" rel="stylesheet">
</head>
<body>

{{--<nav> elementas nurodo naršymo juostą, kuri gali būti pritvirtinta viršutiniame puslapio rėmelyje. Juostoje yra
 keletas nuorodų į skirtingas puslapių dalis.--}}
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        {{--<div> elementai naudojami kaip blokų konteineriai. Pirmas <div> elementas turi klasę "container",
         o kitas - "starter-template". Jie yra skirti aprašyti puslapio turinio išdėstymą ir padėti jį stilizuoti.--}}
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Elektronine drabuziu parduotuve</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Visi produktai</a></li>
                <li class="active"><a href="/categories">Kategorijos</a>
                </li>
                <li><a href="/basket">I krepseli</a></li>
                <li><a href="/reset">Grazinti projekta i pradine padeti</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/admin/home">Admino panele</a></li>
            </ul>
        </div>
    </div>
</nav>
<br>

<div class="container">
    <div class="starter-template">
        @foreach($categories as $category)
            <div class="panel">
                <a href="/{{ $category->code }}">
                    <img src="/storage/categories/mobile.jpg">
                    <h2>{{ $category->name }}</h2>
                </a>
                <p>
                    {{ $category->description }}
                </p>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
