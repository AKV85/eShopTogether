<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Product;
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


//Funkcija basketConfirm() yra susijusi su užsakymų tvarkymo procesu.Kodas pirmiausia patikrina, ar yra pirkimo
//užsakymo identifikatorius (ID), saugomas sesijos kintamajame. Jei tokio identifikatoriaus nėra, vartotojas
// nukreipiamas į pagrindinį puslapį index.Jei yra, Order modelio pagal šį ID randa susijusį užsakymą ir saveOrder()
// metodu įrašo vartotojo informaciją apie užsakymą (pvz., vardą ir telefoną).Jeigu užsakymo informacija sėkmingai
// išsaugota, vartotojas nukreipiamas į pagrindinį puslapį index ir rodomas sėkmingos užsakymo patvirtinimo pranešimas.
// Kitu atveju vartotojas nukreipiamas į pagrindinį puslapį ir rodomas pranešimas apie klaidą.
    public function basketConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);

        if ($success) {
            session()->flash('success', 'Jusu uzsakymas priimtas ir greitai mes su jumis susisieksim');
        } else {
            session()->flash('warning', 'Atsitiko klaida.Atsiprasome uz nepatogumus.');
        }

        return redirect()->route('index');
    }

//    Pirmiausia jis patikrina, ar yra laikoma užsakymo id informacija sesijoje. Jei nėra, jis nukreipia vartotoją į
// pagrindinį puslapį. Kitu atveju jis ieško užsakymo pagal jo id ir paduoda jį į vaizdą "order". Į vaizdą yra
// perduodama tik "order" kintamasis naudojant funkciją "compact()". Tai leidžia vaizde pasiekti "order" kintamąjį,
// kuris yra naudojamas parodyti informaciją apie užsakymą. Galiausiai funkcija grąžina vaizdą "order".
    public function basketPlace()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));
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
        $product = Product::find($productId);

        session()->flash('success', 'Pridejom preke ' . $product->name);

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
        $product = Product::find($productId);

        session()->flash('warning', 'Pasalinom preke  ' . $product->name);

        return redirect()->route('basket');
    }
}
