<?php

namespace App\Http\Controllers;

use App\Managers\BasketManager;
use App\Models\Order;
use App\Models\Sku;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $email = Auth::check() ? Auth::user()->email : $request->email;
        if ((new BasketManager())->saveOrder($request->name, $request->phone, $request->email)) {
            session()->flash('success', __('basket.you_order_confirmed'));
        } else {
            session()->flash('warning', __('basket.you_cant_order_more'));
        }

        return redirect()->route('index');
    }

    public function basketPlace()
    {
        $basket = new BasketManager();// Sukuriamas naujas krepšelio objektas.
        $order = $basket->getOrder();// Gautas užsakymo objektas iš krepšelio objekto.
        // Jei nebėra prekių krepšelyje, nustatomas perspėjimo pranešimas ir nukreipiama atgal į krepšelio puslapį.
        if (!$basket->countAvailable()) {
            session()->flash('warning', __('basket.you_cant_order_more'));
            return redirect()->route('basket');
        }// Grąžinama užsakymo forma, paduodant užsakymo objektą į view ir kompaktuojant kintamąjį $order.
        return view('order', compact('order'));
    }

//    Funkcija "basketAdd" prideda naują prekę į krepšelį, gautą per parametrą "$sku". Ji sukuria naują "BasketManager"
// objektą, kuriame yra patikrinama, ar prekė yra prieinama ir pridedama į krepšelį. Jei prekė sėkmingai pridėta,
// funkcija sukurs sėkmės pranešimą, pateikdamas pranešime prekės pavadinimą, naudojant vertimo funkciją "__()".
// Kitu atveju bus rodomas perspėjimo pranešimas, kad prekės nėra sandėlyje arba yra užsakoma daugiau, nei yra prieinama.
    public function basketAdd(Sku $sku)
    {
        $result = (new BasketManager(true))->addSku($sku);
        if ($result) {
            session()->flash('success', __('basket.added') . $sku->product->__('name'));
        } else {
            session()->flash('warning', $sku->product->__('name') . __('basket.not_available_more'));
        }
        return redirect()->route('basket');
    }

//    Funkcija "basketRemove" pašalina prekę iš krepšelio, gautą per parametrą "$sku". Ji naudoja "BasketManager"
// objektą, kad ištrintų prekę iš krepšelio. Po sėkmingo pašalinimo funkcija parodys pranešimą, kad prekė buvo
// pašalinta iš krepšelio, pateikiant prekės pavadinimą, naudojant vertimo funkciją "__()".
//    public function basketRemove(Sku $sku)
//    {
//        (new BasketManager())->removeSku($sku);
//        session()->flash('warning', __('basket.removed') . $sku->product->__('name'));
//        return redirect()->route('basket');
//    }
//}
    public function basketRemove(Sku $sku)
    {
        $basketManager = new BasketManager();
        $basketManager->removeSku($sku);
        session()->flash('warning', __('basket.removed') . $sku->product->__('name'));
        return redirect()->route('basket');
    }}
