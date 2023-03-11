<?php

namespace App\Http\Controllers;

use App\Managers\BasketManager;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
// Sukuriamas naujas užsakymo objektas naudojant BasketManager klasę.
        $order = (new BasketManager())->getOrder();
        // Grąžinamas krepšelio vaizdas, paduodant užsakymo objektą į view ir kompaktuojant kintamąjį $order.
        return view('basket', compact('order'));
    }

    public function basketConfirm(Request $request)
    {
// Jei pavyko išsaugoti užsakymą, nustatomi sėkmės pranešimas ir ištrinama krepšelio suma.Kitu atveju nustatomas
// perspėjimo pranešimas.
        if ((new BasketManager())->saveOrder($request->name, $request->phone, $request->email)) {
            session()->flash('success', 'Jusu uzsakymas priimtas ir greitai mes su jumis susisieksim!');
        } else {
            session()->flash('warning', 'Deja, daugiau tos prekes neturesim');
        }
        Order::eraseOrderSum();// Ištrinama krepšelio suma.
        return redirect()->route('index');   // Nukreipiama į pagrindinį puslapį.
    }

    public function basketPlace()
    {
        $basket = new BasketManager();// Sukuriamas naujas krepšelio objektas.
        $order = $basket->getOrder();// Gautas užsakymo objektas iš krepšelio objekto.
        // Jei nebėra prekių krepšelyje, nustatomas perspėjimo pranešimas ir nukreipiama atgal į krepšelio puslapį.
        if (!$basket->countAvailable()) {
            session()->flash('warning', 'Deja, daugiau tos prekes neturesim');
            return redirect()->route('basket');
        }// Grąžinama užsakymo forma, paduodant užsakymo objektą į view ir kompaktuojant kintamąjį $order.
        return view('order', compact('order'));
    }

    public function basketAdd(Product $product)
    { // Sukuriamas naujas krepšelio objektas ir pridedama prekė.
        $result = (new BasketManager(true))->addProduct($product);
        // Jei prekė buvo pridėta, nustatomas sėkmės pranešimas. Kitu atveju nustatomas perspėjimo pranešimas.
        if ($result) {
            session()->flash('success', 'Pridejote   ' . $product->name);
        } else {
            session()->flash('warning', 'Deja daugiau  ' . $product->name . ' neturesime');
        }

        return redirect()->route('basket');
    }

    public function basketRemove(Product $product)
    {
        (new BasketManager())->removeProduct($product);

        session()->flash('warning', 'Pasalinta preke  ' . $product->name);

        return redirect()->route('basket');
    }
}
