<?php

namespace App\Managers;

use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Sku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BasketManager
{
    protected $order;

    /**
     * Basket constructor.
     * @param bool $createOrder
     */

//    BasketManager konstruktorius, kuris sukuria krepšelio objektą. Jei nėra jokio krepšelio, jis sukuria naują
// krepšelio objektą ir jį išsaugo sesijoje.
    public function __construct($createOrder = false)
    {
        $order = session('order');
        if (is_null($order) && $createOrder) {
            $data = [];
            if (Auth::check()) {
                $data['user_id'] = Auth::id();
            }

            $this->order = new Order($data);
            session(['order' => $this->order]);
        } else {
            $this->order = $order;
        }
    }

    /**
     * @return mixed
     */
//    getOrder() - Funkcija, kuri gražina dabartinio BasketManager objekto Order objektą. Tai naudinga, jei
// norite gauti dabartinio Order objekto informaciją.
    public function getOrder()
    {
        return $this->order;
    }

//    countAvailable metodas, kuris patikrina, ar produktų kiekis užtenka krepšelyje ir atnaujina produkto kiekį,
// jei reikia.
    public function countAvailable($updateCount = false)
    {
        $skus = collect([]);//collect() yra Laravel pagalbinė funkcija, kuri sukuria naują kolekciją, kuri yra
        // paprastas masyvas su daugybe metodų.
        foreach ($this->order->skus as $orderSku) {
            $sku = Sku::find($orderSku->id);
            if ($orderSku->countInOrder > $sku->count) {
                return false;
            }

            if ($updateCount) {
                $sku->count -= $orderSku->countInOrder;
                $skus->push($sku);//push() metodas yra kolekcijos metodas, kuris prideda elementą į kolekciją.
                // Jis gali pridėti elementą masyvo gale. Pavyzdžiui, ši eilutė $this->order->skus->push($sku);
                // prideda naują $sku elementą į $this->order->skus kolekciją.
            }
        }

        if ($updateCount) {
            $skus->map->save();//Ši eilutė yra naudojama, kad atnaujintų kiekvieną SKU objektą, kurio kiekis buvo
            // pakeistas užsakyme. map() metodas sukuria naują kolekciją, kuri yra padaryta iš visų SKU objektų,
            // esančių originalioje kolekcijoje ($skus), ir kiekvienam iš jų priskiria save() metodą, kuris išsaugo
            // pakeitimus duomenų bazėje. Taigi, ši eilutė naudoja map() metodą, kad galėtų atnaujinti visus SKU
            // objektus, kurie buvo pakeisti užsakyme, pagal juos originalioje kolekcijoje ir išsaugoti pakeitimus
            // duomenų bazėje, jei reikia.
        }

        return true;
    }

//saveOrder($name, $phone, $email) - Funkcija, kuri saugo užsakymą duomenų bazėje ir siunčia patvirtinimo laišką
// pirkėjui. Jei prekių nepakanka, funkcija grąžina false. Jei viskas tvarkinga, funkcija sukuria naują Order objektą
// ir siunčia patvirtinimo laišką naudodamasi Laravel Mail klasės funkcija. Funkcija grąžina true, jei viskas buvo sėkminga.
    public function saveOrder($name, $phone,$email)
    {
        if (!$this->countAvailable(true)) {
            return false;
        }
        $this->order->saveOrder($name, $phone);
        Mail::to($email)->send(new OrderCreated($name, $this->getOrder()));
        session()->forget('order');
        return true;
    }


//    Ši funkcija yra atsakinga už pašalinti konkretų produktą iš krepšelio.Pirma, gauname krepšelio objektą iš
// sesijos. Tada, naudodami search metodą, surandame indeksą kuris atitinka $sku objektą masyve skus. Jeigu indeksas
// nėra false, tada mes turime mūsų norimą pivot row. Toliau tikriname ar pasirinktas produktas turi kiekį, mažesnį
// nei 2. Jei taip, naudojame splice metodą, kad pašalintume jį iš masyvo, naudodami pivot row indeksą. Jei pivot row
// kiekis yra didesnis nei 1, sumažiname pivot row kiekį vienetu.Galiausiai, tikriname ar krepšelio masyvas yra
// tuščias. Jeigu taip, ištriname krepšelio objektą iš sesijos. Jeigu ne,skaičiuojame krepšelio sumą, išsaugojame
// krepšelio objektą ir priskiriame jį sesijai.Pastaba: splice metodas yra naudojamas pašalinti elementą iš masyvo
// pagal indeksą ir grąžinti masyvą be to elemento. Pavyzdžiui,$array->splice($index, 1) grąžintų masyvą be elemento,
// kurio indeksas yra $index.
    public function removeSku(Sku $sku)
    {
        $order = session('order');
        $index = $order->skus->search(function ($item) use ($sku) {
            return $item->id === $sku->id;
        });
        if ($index !== false) {
            $pivotRow = $order->skus[$index];

            if ($pivotRow->countInOrder < 2) {
                $order->skus->splice($index, 1);
            } else {
                $pivotRow->countInOrder--;
            }

            if ($order->skus->isEmpty()) {
                session()->forget('order');
            } else {
                $order->sum = $order->getFullSum();
                $order->save();
                session(['order' => $order]);
            }
        }
    }


    public function addSku(Sku $sku)
    {
        if ($this->order->skus->contains($sku)) {
            //contains() yra kolekcijos metodas, kuris tikrina, ar kolekcija turi nurodytą reikšmę. Funkcija priima
            // reikšmę, kuriai tikrinama, ar ją turime kolekcijoje, ir grąžina true, jei reikšmė yra kolekcijoje, ir
            // false, jei ne.
            $pivotRow = $this->order->skus->where('id', $sku->id)->firstOrFail();
            if ($pivotRow->countInOrder >= $sku->count) {
                return false;
            }
            $pivotRow->countInOrder++;
        } else {
            if ($sku->count == 0) {
                return false;
            }
            $sku->countInOrder = 1;
            $this->order->skus->push($sku);
            //push() metodas įdeda nurodytą reikšmę į kolekcijos galą. Tai gali būti masyvo elementas arba bet koks
            // kito tipo objektas. Šis metodas grąžina naują kolekcijos dydį.
        }

        return true;
    }
}
