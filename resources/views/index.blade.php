
<!doctype html>
<html lang="en">{{--Įdedamas žymės ženklų rinkinys, kuriame nurodoma, kad dokumentas yra anglų kalba.--}}
<head>
    {{--Aprašomas puslapio viršutinė dalis: nustatomas simbolių rinkinys, numatytasis atvaizdavimo būdas,
     svetainės pavadinimas, sukuriama nuoroda į šrifto rinkinį ir nuoroda į Bootstrap failą.--}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elektronine drabuziu parduotuve</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/startCss.css" rel="stylesheet">
</head>
<body>
{{-- Aprašomas puslapio viršutinis meniu: nuoroda į pagrindinį puslapį, nuoroda į produktų kategorijas, nuoroda į
prekių krepšelį ir nuoroda į projektą. Taip pat yra nuoroda į administratoriaus valdymo skydelį.--}}
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">E-shop parduotuve</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li  class="active" ><a href="/">Visi produktai</a></li>
                <li ><a href="/categories">Kategorijos</a>
                </li>
                <li ><a href="/basket">I krepseli</a></li>
                <li><a href="/reset">Grazinti projekta i pradine padeti</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/admin/home">Admino panele</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    {{--Aprašomas pagrindinis puslapio turinys. Tai yra prekių galerija, kurioje yra paveikslėlis, pavadinimas, kaina
     ir nuorodos į prekių krepšelį ir išsamiau susipažinti su preke.--}}
    <div class="starter-template">
        <h1>Visos prekes</h1>

        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://eShopForEveryone/storage/products/kepure1" alt="vyr.kepure">
                    <div class="caption">
                        <h3>Vyr.kepure</h3>
                        <p>71 Eur</p>
                        <p>
                            <a href="http://eShopForEveryone/basket/1/add" class="btn btn-primary" role="button">I krepseli</a>
                            <a href="http://eShopForEveryone/vyrai/vyr.kepure" class="btn btn-default"
                               role="button">Placiau</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://eShopForEveryone/storage/products/mot.kelnes" alt="mot.kelnes">
                    <div class="caption">
                        <h3>mot.kelnes</h3>
                        <p>89 eur</p>
                        <p>
                            <a href="http://eShopForEveryone/basket/2/add" class="btn btn-primary" role="button">I krepseli</a>
                            <a href="http://eShopForEveryone/moterys/mot.kelnes" class="btn btn-default"
                               role="button">Placiau</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://eShopForEveryone/storage/products/mot.megztinis" alt="mot.megztinis">
                    <div class="caption">
                        <h3>mot.megztinis</h3>
                        <p>22 eur</p>
                        <p>
                            <a href="http://eShopForEveryone/basket/3/add" class="btn btn-primary" role="button">I krepseli</a>
                            <a href="http://eShopForEveryone/moterys/mot.megztinis" class="btn btn-default"
                               role="button">Placiau</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://eShopForEveryone/storage/products/mot.striuke" alt="mot.striuke">
                    <div class="caption">
                        <h3>mot.striuke</h3>
                        <p>52 eur</p>
                        <p>
                            <a href="http://eShopForEveryone/basket/4/add" class="btn btn-primary" role="button">I krepseli</a>
                            <a href="http://eShopForEveryone/moterys/mot.striuke" class="btn btn-default"
                               role="button">Placiau</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://eShopForEveryone/storage/products/mot.sijonas" alt="mot.sijonas">
                    <div class="caption">
                        <h3>mot.sijonas</h3>
                        <p>52 eur</p>
                        <p>
                            <a href="http://eShopForEveryone/basket/5/add" class="btn btn-primary" role="button">I krepseli</a>
                            <a href="http://eShopForEveryone/moterys/mot.sijonas" class="btn btn-default"
                               role="button">Placiau</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://eShopForEveryone/storage/products/vaik.megztinis" alt="vaik.megztinis">
                    <div class="caption">
                        <h3>vaik.megztinis</h3>
                        <p>52 eur</p>
                        <p>
                            <a href="http://eShopForEveryone/basket/6/add" class="btn btn-primary" role="button">I krepseli</a>
                            <a href="http://eShopForEveryone/moterys/vaik.megztinis" class="btn btn-default"
                               role="button">Placiau</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://eShopForEveryone/storage/products/vaik.megztinis" alt="vaik.megztinis">
                    <div class="caption">
                        <h3>vaik.megztinis</h3>
                        <p>52 eur</p>
                        <p>
                            <a href="http://eShopForEveryone/basket/7/add" class="btn btn-primary" role="button">I krepseli</a>
                            <a href="http://eShopForEveryone/moterys/vaik.megztinis" class="btn btn-default"
                               role="button">Placiau</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://eShopForEveryone/storage/products/vaik.megztinis" alt="vaik.megztinis">
                    <div class="caption">
                        <h3>vaik.megztinis</h3>
                        <p>52 eur</p>
                        <p>
                            <a href="http://eShopForEveryone/basket/8/add" class="btn btn-primary" role="button">I krepseli</a>
                            <a href="http://eShopForEveryone/moterys/vaik.megztinis" class="btn btn-default"
                               role="button">Placiau</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://eShopForEveryone/storage/products/vaik.megztinis" alt="vaik.megztinis">
                    <div class="caption">
                        <h3>vaik.megztinis</h3>
                        <p>52 eur</p>
                        <p>
                            <a href="http://eShopForEveryone/basket/9/add" class="btn btn-primary" role="button">I krepseli</a>
                            <a href="http://eShopForEveryone/moterys/vaik.megztinis" class="btn btn-default"
                               role="button">Placiau</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://eShopForEveryone/storage/products/vaik.megztinis" alt="vaik.megztinis">
                    <div class="caption">
                        <h3>vaik.megztinis</h3>
                        <p>52 eur</p>
                        <p>
                            <a href="http://eShopForEveryone/basket/10/add" class="btn btn-primary" role="button">I krepseli</a>
                            <a href="http://eShopForEveryone/moterys/vaik.megztinis" class="btn btn-default"
                               role="button">Placiau</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://eShopForEveryone/storage/products/vaik.megztinis" alt="vaik.megztinis">
                    <div class="caption">
                        <h3>vaik.megztinis</h3>
                        <p>52 eur</p>
                        <p>
                            <a href="http://eShopForEveryone/basket/11/add" class="btn btn-primary" role="button">I krepseli</a>
                            <a href="http://eShopForEveryone/moterys/vaik.megztinis" class="btn btn-default"
                               role="button">Placiau</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
