<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sku;

class SkusController extends Controller
{

//    Pateiktas kodas gauna Sku modelio duomenis su susijusiais produktais, taikant "available" metodą, kuris yra
// apibrėžtas Sku modelyje. Tada "product_name" yra pridėta prie kiekvieno Sku objekto, naudojant "append" metodą.
//Galiausiai funkcija grąžina HTTP atsakymą su JSON duomenų formatu, kuriame yra pateikti visi Sku objektai su jų
// susijusiais produktais ir pridėtu "product_name" atributu. JSON duomenys yra gražiai atvaizduoti naudojant
// JSON_PRETTY_PRINT parametrą.
    public function getSkus()
    {
        $skus = Sku::with('product')
            ->available()
            ->get()
            ->append('product_name');
//        "append" yra Laravel Eloquent ORM metodas, kuris leidžia pridėti naujus atributus modelio objektams,
// kurie neegzistuoja duomenų bazėje.Tai yra naudinga, kai norite pridėti papildomą informaciją prie objektų, kurie yra
// susiję su modeliu, bet nepriklauso jam. Pavyzdžiui, jei turite Sku modelį, galite naudoti "append" metodą pridėdami
// naują atributą "product_name", kuriame yra susijusio produkto pavadinimas, kad būtų lengviau atvaizduoti informaciją
// vartotojo sąsajoje.Šis metodas veikia taip: jis prideda naują atributą modelio objektams, kuriame yra funkcijos
// grąžinama reikšmė. Ši funkcija gali būti anoniminė funkcija arba tiesiog statinis tekstinis atributas. Kai jūs
// naudojate "append" metodą, naujas atributas bus pridėtas prie visų modelio objektų.

        return response()->json($skus, 200, [], JSON_PRETTY_PRINT);
    }
}
