
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
            <a class="navbar-brand" href="/">E-shop parduotuve</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="/">Visi produktai</a></li>
                <li ><a href="/categories">Kategorijos</a>
                </li>
                <li ><a href="/basket">I krepseli</a></li>
                <li><a href="/reset">Grazinti projekta i pradine padeti</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-fixed-bottom">
                <li><a href="/admin/home">Admino panele</a></li>
            </ul>
        </div>
    </div>
</nav>
<br>

<div class="container">
    {{--Toliau puslapyje yra produktas - vyrų kepure - kurio pavadinimas, kaina ir nuotrauka yra pateikti virš
     teksto aprašymo. Tekstas trumpai aprašo produkto savybes ir yra pateikta mygtukų nuoroda "Į krepšelį",
      kad pirkėjas galėtų pridėti produktą į savo krepšelį ir tęsti apsipirkimą.--}}
    <div class="starter-template">
        <h1>Vyr.kepure</h1>
        <h2>{{$product}}</h2>
        <p>Kaina: <b>7 Eur</b></p>
        <img src="http://eShopForEveryone.lt/storage/products/vyr.kepure">
        <p>Puikiai prie galvos priglundanti kepure</p>
        <a class="btn btn-success" href="/basket/1/add">I krepseli</a>
    </div>
</div>
</body>
</html>
