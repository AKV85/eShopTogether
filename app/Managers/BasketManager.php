<?php

namespace App\Managers;

use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BasketManager
{
    protected $order;//protected $order" savybė skirta saugoti krepšelio objektą.

    /**
     * Basket constructor.
     * @param  bool  $createOrder
     */
//__construct" funkcija yra klasės konstruktorius, kuris yra iškviečiamas kiekvieną kartą, kai kuriama nauja
// "BasketManager" klasės objektas. Ji priima vieną argumentą - "createOrder", kuris nurodo, ar sukurti naują
// užsakymą, jei jo dar nėra.
public function __construct($createOrder = false)
    {
        $orderId = session('orderId');//"session('orderId')" funkcija grąžina ID dabartinio krepšelio iš sesijos.
//"is_null($orderId)" tikrina ar ID krepšelio yra null reikšmėje.
        if (is_null($orderId) && $createOrder) {
            $data = [];//
            if (Auth::check()) {
                $data['user_id'] = Auth::id();
            }

            $this->order = Order::create($data);//"Order::create($data)" sukuria naują užsakymą su duomenimis, gautais iš "Auth" klasės
            session(['orderId' => $this->order->id]);//"Order::create($data)" sukuria naują užsakymą su duomenimis, gautais iš "Auth" klasės
        } else {
            $this->order = Order::findOrFail($orderId);//"Order::findOrFail($orderId)" grąžina užsakymo objektą pagal ID.
        }
    }

    /**
     * @return mixed
     */
    public function getOrder()//"getOrder" funkcija grąžina dabartinio krepšelio objektą.
    {
        return $this->order;
    }
//"countAvailable" funkcija tikrina, ar prekės yra pasiekiamos, ir jei $updateCount = true, sumažina prekių skaičių krepšelyje
    public function countAvailable($updateCount = false)
    {//"$this->order->products" grąžina kolekciją, kuri apima prekių krepšelyje modelius.
        foreach ($this->order->products as $orderProduct)
        {//"$orderProduct->count" yra prekės krepšelyje kiekis.
            if ($orderProduct->count < $this->getPivotRow($orderProduct)->count) {//"$this->getPivotRow($orderProduct)->count"
                // grąžina prekės krepšelyje kiekį pagal "pivot" lenteles reikšmes
                return false;
            }
            if ($updateCount) {//"$orderProduct->count -= $this->getPivotRow($orderProduct)->count" atimama prekių kiekis.
                $orderProduct->count -= $this->getPivotRow($orderProduct)->count;
            }
        }

        if ($updateCount) {//"$this->order->products->map->save()" išsaugo kiekvieną krepšelyje esančią prekę.
            $this->order->products->map->save();
        }

        return true;
    }
//"saveOrder" funkcija išsaugo užsakymo informaciją į duomenų bazę, jei prekės pasiekiamos, ir siunčia užsakymo patvirtinimo laišką.
    public function saveOrder($name, $phone, $email)
    {//Patikrina, ar prekių pakanka, ir jei ne, tai gražina false.
        if (!$this->countAvailable(true)) {
            return false;
        }//"Mail::to($email)->send(new OrderCreated($name, $this->getOrder()))" funkcija siunčia el. laišką.
        Mail::to($email)->send(new OrderCreated($name, $this->getOrder()));
        return $this->order->saveOrder($name, $phone);//Išsaugo užsakymą su nurodytu vardu ir telefonu, gražina true,
        // jei operacija sėkminga, ir false, jei ne.
    }

//    Funkcija getPivotRow($product) yra apsaugota (protected) ir priima vieną argumentą - prekės objektą. Ji grąžina
// papildomą informaciją apie prekės ir užsakymo santykį (t.y. kiek kiekvienos prekės yra užsakyta) per pivot lentelę,
// kuri yra daugeliu ryšių tarp prekių ir užsakymų. Tai yra naudojama kitose funkcijose, kai norima gauti informaciją
// apie prekės kiekį ar atlikti veiksmus su prekėmis, pvz., pašalinti ar pridėti prekę į krepšelį.
//Funkcija getPivotRow($product) išrenka užsakymo ir prekės ryšį (pivot row) per products() ryšio metodą, ir sukelia
// WHERE užklausą su prekės ID. Gautas rezultatas yra pivot eilutė, kuri yra naudojama kitose funkcijose, kur
// reikia prieiti prie papildomos informacijos apie prekę, pvz., kiek jų yra užsakyta.

    protected function getPivotRow($product)
    {
        return $this->order->products()->where('product_id', $product->id)->first()->pivot;
    }

//    Ši funkcija pašalina nurodytą prekę iš krepšelio. Pirmiausia funkcija patikrina, ar krepšelyje yra nurodyta prekė.
// Jei taip, tada ji gauna papildomą informaciją apie prekės ir užsakymo santykį per funkciją getPivotRow().
// Tada ji tikrina, ar šios prekės kiekis yra mažesnis nei 2. Jei taip, prekė yra pašalinama iš užsakymo. Jei kiekis
// yra didesnis arba lygus 2, tada kiekis yra sumažinamas vienetu ir pivot eilutė yra atnaujinama. Taip pat ši funkcija
// sumažina bendrą krepšelio kainą atimant nurodytos prekės kainą per Order::changeFullSum() funkciją.
    public function removeProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->getPivotRow($product);
            if ($pivotRow->count < 2) {
                $this->order->products()->detach($product->id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        Order::changeFullSum(-$product->price);
    }
//Ši funkcija atsakinga už prekių pridėjimą prie krepšelio. Ji priima Product objektą kaip argumentą, kuris yra prekė,
// kurią reikia pridėti į krepšelį.Pirma funkcija patikrina, ar prekė jau yra krepšelyje. Jei taip, tada prideda vieną
// prekės kiekį. Jei kiekis viršija prekių likutį, funkcija grąžina false, nes negalima pridėti daugiau prekių, nei yra
// likusių. Kitu atveju ji atnaujina pivot lentelės kiekį.Jei prekė dar nebuvo pridėta į krepšelį, funkcija patikrina,
// ar prekės likutis yra didesnis nei nulis. Jei prekių likutis yra nulis, funkcija grąžina false, nes negalima pridėti
// prekių, kurios nebeturi likučių. Kitu atveju ji prideda prekę į krepšelį ir atnaujina bendrą sumą.
//Galų gale, funkcija grąžina true, jei prekė buvo sėkmingai pridėta į krepšelį.
    public function addProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->getPivotRow($product);
            $pivotRow->count++;
            if ($pivotRow->count > $product->count) {
                return false;
            }
            $pivotRow->update();
        } else {
            if ($product->count == 0) {
                return false;
            }
            $this->order->products()->attach($product->id);
        }

        Order::changeFullSum($product->price);

        return true;
    }
}
