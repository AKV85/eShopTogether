<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;

class BasketIsNotEmpty

//Ši funkcija yra Laravel karkaso viduje ir naudojama apdoroti HTTP užklausas. Ji turi du parametrus:
//$request - objektas, kuris saugo informaciją apie gautą užklausą.
//$next - funkcija, kuri atlieka sekančius žingsnius apdorojant užklausą.
//Ši funkcija yra naudojama tarpinių apdorojimo (middleware) grandinėje, kuri apima daugybę middleware funkcijų,
// kad būtų galima apdoroti užklausas. Ši konkreti funkcija yra atsakinga už apdorojimą tarpinėje grandinėje.
//Ši funkcija grąžina rezultatą, kuris gali būti naudojamas tolimesniam apdorojimui arba siunčiamas atgal į klientą.

{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
//Ši funkcija yra Laravel tarpinės grandinės (middleware) funkcija, kuri gautą HTTP užklausą pirmiausia patikrina,
// ar jau yra sukurtas krepšelio užsakymo numeris (orderId) ir jį įrašo į kintamąjį $orderId.
//Krepšelio užsakymo numeris (orderId) saugomas sesijoje, todėl ši funkcija naudoja Laravel sesijos funkcijas tam,
// kad gautų informaciją iš sesijos ir perduotų ją kintamajam $orderId.
//Kintamasis $orderId vėliau naudojamas kitose funkcijose, kad būtų galima atlikti veiksmus su užsakymo duomenimis.

    public function handle($request, Closure $next)
    {
        $orderId = session('orderId');


        // Jei kintamasis $orderId nėra null, tai vykdomos šios instrukcijos:
        //Surandamas Order objektas pagal $orderId parametrą.
        //  Jei Order objekto produktų skaičius yra lygus 0, tuomet iššaukiamas pranešimas "Jūsų krepšelis tuščias!" ir
        // nukreipiamas vartotojas į pagrindinį puslapį.
        // Jei produktų skaičius nėra lygus 0, tuomet grįžtama prie vykdymo tą pačią eilutę ir vykdoma toliau.
        // Šis kodas atlieka krepšelio validavimą užsakymo patvirtinimo metu, kad užsakymas neturėtų tuščio krepšelio.


        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            if ($order->products->count() > 0) {
                return $next($request);
            }
        }
        session()->flash('warning', 'Jūsų krepšelis tuščias!');
        return redirect()->route('index');
    }
}
