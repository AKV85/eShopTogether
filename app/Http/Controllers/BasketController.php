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


//    metodas atsakingas už prekės pridėjimą į krepšelį. Paimamas orderId iš sesijos kintamojo. Jei orderId
// neegzistuoja, sukuriamas naujas užsakymas ir orderId saugomas sesijoje. Kitu atveju ieškoma užsakymo pagal orderId,
// pridedama prekė, kurios id yra paduodamas $productId parametru, ir grąžinamas basket.blade.php šablonas su nauja
// užsakymo informacija per compact() funkciją.
    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create()->id;
            session(key: ['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
            $order->products()->attach($productId);
            return view('basket', compact('order'));
        }
    }
}
