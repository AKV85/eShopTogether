<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->where('status', 1)->paginate(10);
        return view('auth.orders.index', compact('orders'));
    }


//    Šis kodas yra naudojamas patikrinti, ar dabartinis prisijungęs naudotojas yra savininkas tam tikro užsakymo,
// kurio objektas yra paduodamas kaip kintamasis $order. Jei naudotojas nėra savininkas šio užsakymo, jis yra
// atidirbamas su dd($order) funkcija ir grįžtama atgal į ankstesnį puslapį su return back() funkcija.
//Auth::user() yra naudojama gauti dabartinio prisijungusio naudotojo objektą. Šiame kodo pavyzdyje yra naudojamas
// toks metodas: orders, kuris sugrąžina kolekciją su visais užsakymais, kuriuos šis naudotojas yra padaręs. Tada
// contains() metodas patikrina, ar ši kolekcija yra priskiriama $order objektui.Šis kodas yra naudojamas užtikrinti,
// kad tik prisijungę naudotojai turėtų prieigą prie jų sukurtų užsakymų ir kad kiti naudotojai negalėtų peržiūrėti ar
// modifikuoti jų užsakymų.
    public function show(Order $order)
    {
        if (!Auth::user()->orders->contains($order)) {
            dd($order);
            return back();
        }

        return view('auth.orders.show', compact('order'));
    }
}
