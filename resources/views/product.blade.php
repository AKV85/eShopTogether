
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elektronine drabuziu parduotuve</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/startCss.css" rel="stylesheet">
</head>
<body>
{{--Puslapio struktūra yra padalinta į "navbar" ir "container" dalis. "navbar" yra juoda naršymo juosta viršuje,
 kurioje yra nuorodos į kitus puslapius, o "container" yra vieta, kurioje yra prekės pavadinimas, kaina, nuotrauka
  ir tekstas. Į puslapio stilių yra įtrauktas Bootstrap CSS, kuris yra labai populiarus ir lengvai pritaikomas
   tinklalapiams.--}}
<nav class="navbar navbar-inverse navbar-fixed-top">
    {{--Puslapio viršuje yra juoda naršymo juosta, kurioje yra parduotuvės pavadinimas ir nuorodos į produktų
     kategorijas, pirkimo krepšelį ir administratoriaus valdymo puslapį.--}}
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://eShopForEveryone.lt">E-shop parduotuve</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="http://eShopForEveryone.lt">Visi produktai</a></li>
                <li ><a href="http://eShopForEveryone.lt/categories">Kategorijos</a>
                </li>
                <li ><a href="http://eShopForEveryone.lt/basket">I krepseli</a></li>
                <li><a href="http://eShopForEveryone.lt/reset">Grazinti projekta i pradine padeti</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://eShopForEveryone.lt/admin/home">Admino panele</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    {{--Toliau puslapyje yra produktas - vyrų kepure - kurio pavadinimas, kaina ir nuotrauka yra pateikti virš
     teksto aprašymo. Tekstas trumpai aprašo produkto savybes ir yra pateikta mygtukų nuoroda "Į krepšelį",
      kad pirkėjas galėtų pridėti produktą į savo krepšelį ir tęsti apsipirkimą.--}}
    <div class="starter-template">
        <h1>Vyr.kepure</h1>
        <p>Kaina: <b>7 Eur</b></p>
        <img src="http://eShopForEveryone.lt/storage/products/iphone_x.jpg">
        <p>Puikiai prie galvos priglundanti kepure</p>
        <a class="btn btn-success" href="http://eShopForEveryone.lt/basket/1/add">I krepseli</a>
    </div>
</div>
</body>
</html>
