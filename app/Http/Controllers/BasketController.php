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
        $order = (new BasketManager())->getOrder();
        return view('basket', compact('order'));
    }

    public function basketConfirm(Request $request)
    {
        if ((new BasketManager())->saveOrder($request->name, $request->phone)) {
            session()->flash('success', 'Jusu uzsakymas priimtas ir greitai mes su jumis susisieksim!');
        } else {
            session()->flash('warning', 'Deja, daugiau tos prekes neturesim');
        }

        Order::eraseOrderSum();

        return redirect()->route('index');
    }

    public function basketPlace()
    {
        $basket = new BasketManager();
        $order = $basket->getOrder();
        if (!$basket->countAvailable()) {
            session()->flash('warning', 'Deja, daugiau tos prekes neturesim');
            return redirect()->route('basket');
        }
        return view('order', compact('order'));
    }

    public function basketAdd(Product $product)
    {
        $result = (new BasketManager(true))->addProduct($product);

        if ($result) {
            session()->flash('success', 'Pridejote   '.$product->name);
        } else {
            session()->flash('warning', 'Deja daugiau  '.$product->name . ' neturesime');
        }

        return redirect()->route('basket');
    }

    public function basketRemove(Product $product)
    {
        (new BasketManager())->removeProduct($product);

        session()->flash('warning', 'Pasalinta preke  '.$product->name);

        return redirect()->route('basket');
    }
}
