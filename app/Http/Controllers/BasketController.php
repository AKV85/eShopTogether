<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
//    basket(): Šis metodas atsakingas už rodyklės į krepšelio puslapį grąžinimą. Paimamas orderId iš sesijos kintamojo
// ir pagal jį gautas užsakymas yra grąžinamas į basket.blade.php šabloną, kuris yra sugeneruojamas su $order
// kintamuoju, prieinamu per compact() funkciją.
    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }
        return view('basket', compact('order'));
    }

//metodas atsakingas už užsakymo formos rodyklės grąžinimą, kad vartotojas galėtų užpildyti užsakymą.
    public function basketPlace()
    {
        return view('order');
    }

//Kodas pradeda sukurdamas kintamąjį $orderId, kuris turi sesijos kintamojo reikšmę "orderId". Jei šis kintamasis yra
// null (t.y. nebuvo sukurtas užsakymas), tada sukuriamas naujas užsakymas Order modelyje ir priskiriamas jo id sesijos
// kintamajam "orderId". Kitu atveju, kintamajam $order priskiriamas esamas užsakymas, rastas pagal jo id.
//Toliau funkcija tikrina, ar prekė jau yra krepšelyje (naudojant contains metodą). Jei taip, tada atnaujinamas
// pivot lenteles įrašas, kuriame yra prekės kiekis. Jei ne, prekė pridedama prie krepšelio naudojant attach() metodą.
//Galiausiai, funkcija peradresuoja vartotoją į krepšelio puslapį.
    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(key: ['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }
        return redirect()->route('basket');
    }


//    Ši funkcija yra skirta ištrinti produktą iš krepšelio. Pirma, funkcija patikrina, ar egzistuoja krepšelio
// užsakymo ID sesija. Jei nėra, nukreipia naudotoją į krepšelio puslapį.Tada funkcija ieško užsakymo pagal surastą ID
// ir patikrina, ar krepšelio produktų sąrašas (angl. products) turi nurodytą produktą (pagal produktų ID).
//Jei produktas yra krepšelyje, funkcija ieško produkto ryšio su užsakymu eilutę pivot lentelėje. Jei produkto kiekis
// yra mažesnis nei 2, funkcija pašalina produktą iš sąrašo (detach metodas). Kitu atveju produktų kiekis sumažinamas
// vienetu naudojant pivot ryšio objektą ir nauji duomenys išsaugomi pivot lentelėje.
//Galiausiai, funkcija nukreipia naudotoją į krepšelio puslapį.
    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        return redirect()->route('basket');
    }
}
