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

//    public function handle($request, Closure $next)
//    {
//        $order = session('order');
//dd($order);
//        if (!is_null($order) && (new Order)->getFullSum() > 0) {
//            return $next($request);
//        }
//
//        session()->flash('warning', __('basket.cart_is_empty'));
//        return redirect()->route('index');
//    }
//}

//public function handle($request, Closure $next)
//{    $order = session('order');
//
//    if (!is_null($order)
//        &&
//        (new Order)->getFullSum() > 0)
//    {
//        return $next($request);
//    }
//    session()->forget('order');
//    session()->flash('warning', __('basket.cart_is_empty'));
//    return redirect()->route('index');
//}

//    public function handle($request, Closure $next)
//    {
//        $order = session('order');
//
//        if (isset($order) && $order->getFullSum() > 0) {
//            return $next($request);
//        }
//
//        session()->forget('order');
//        session()->flash('warning', __('basket.cart_is_empty'));
//
//        return redirect()->route('index');
//    }

    public function handle($request, Closure $next)
    {
        $order = session('order');

        if ($order && $order->skus->count() > 0 && (new Order)->getFullSum() > 0) {
            return $next($request);
        }

        session()->forget('order');
        session()->flash('warning', __('basket.cart_is_empty'));
        return redirect()->route('index');
    }
}
