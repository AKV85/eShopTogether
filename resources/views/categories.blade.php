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
            <a class="navbar-brand" href="http://eShopForEveryone.lt">Elektronine drabuziu parduotuve</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="http://http://eShopForEveryone.lt">Visi produktai</a></li>
                <li class="active"><a href="eShopForEveryone.lt/categories">Kategorijos</a>
                </li>
                <li><a href="http://http://eShopForEveryone.lt/basket">I krepseli</a></li>
                <li><a href="http://http://eShopForEveryone.lt/reset">Grazinti projekta i pradine padeti</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://http://eShopForEveryone.lt/admin/home">Admino panele</a></li>
            </ul>
        </div>
    </div>
</nav>
<br>

<div class="container">
    <div class="starter-template">
        <div class="panel">
            {{--Puslapio turinys yra suskirstytas į tris blokus <div class="panel">. Kiekvienas blokas turi
            nuorodą į skirtingas kategorijas - vyrų, moterų ir vaikų drabužius, ir trumpą aprašymą apie šias
             kategorijas. Kiekvienas blokas taip pat turi paveikslėlį, kuris yra susietas su atitinkama kategorija.--}}
            <a href="/men">
                <img src="http://http://eShopForEveryone.lt/storage/categories/mens.jpg">
                <h2>Vyriski drabuziai</h2>
            </a>
            <p>Cia bus vyru drabuziai </p>
        </div>
        <div class="panel">
            <a href="/women">
                <img src="http://http://eShopForEveryone.lt/storage/categories/portable.jpg">
                <h2>Moteryski drabvuziai</h2>
            </a>
            <p>
                Cia bus moteriski drabuziai
            </p>
        </div>
        <div class="panel">
            <a href="/kids">
                <img src="http://http://eShopForEveryone.lt/storage/categories/appliance.jpg">
                <h2>Vaiku drabuziai</h2>
            </a>
            <p>
                Cia vaikiski drabuziai
            </p>
        </div>
    </div>
</div>
</body>
</html>
