<?php

namespace App\Http\Controllers;

use App\Managers\BasketManager;
use App\Models\order;
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
            session()->flash('success',  __('basket.you_order_confirmed'));
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

    public function basketAdd(Sku $sku)
    {
        $result = (new BasketManager(true))->addSku($sku);

        if ($result) {

            session()->flash('success', __('basket.added').$sku->product->__('name'));
        } else {

            session()->flash('warning', $sku->product->__('name') . __('basket.not_available_more'));
        }

        return redirect()->route('basket');
    }

    public function basketRemove(Sku $sku)
    {
        (new BasketManager())->removeSku($sku);

        session()->flash('warning', __('basket.removed').$sku->product->__('name'));

        return redirect()->route('basket');
    }
}
