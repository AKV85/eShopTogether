<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $status
 * @property string $name
 * @property string $phone
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Order extends Model
{


    protected $fillable = [
        'status',
        'name',
        'phone',
    ];


//    Funkcija "products" apibrėžia daugybę-į-daugybę ryšį tarp "Order" ir "Product" modelių. Tai reiškia, kad
// kiekvienas krepšelio užsakymas (Order) gali turėti daug produktų (Product) ir kiekvienas produktas gali būti
// priskirtas daugybei krepšelio užsakymų. Šis ryšys yra apibrėžtas naudojant Laravel Eloquent "belongsToMany" metodą,
// kuris grąžina ryšio objektą, leidžiantį naudoti ryšio metodus. "withPivot" metodas nurodo papildomą lauką
// (pavadinimu "count"), kuris yra saugomas pivot lentelėje. Pivot lentelė yra tarpinė lentelė, kuri saugo papildomus
// laukus, kuriuos galima priskirti daugybei-į-daugybę ryšių. Šiuo atveju, "count" laukas nurodo, kiek vnt. konkretus
// produktas yra priskirtas konkrečiam krepšelio užsakymui."withTimestamps" metodas nustato, kad pivot lentelė
// automatiškai pildys sukūrimo ir atnaujinimo datos laukus, t.y., šie duomenys bus automatiškai užpildyti kiekvieną
// kartą, kai bus sukuriamas ar atnaujinamas ryšys.
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    //    Funkcija  naudojama skaičiuoti krepšelio užsakymo bendrąją kainą. Tai daroma pereinant per visus
// produktus krepšelyje ir pridedant kainą už kiekvieną produktą, dauginant ją iš jo kiekio (naudojant
// "getPriceForCount" metodą iš "Product" modelio). Galiausiai, funkcija grąžina visų produktų bendrąją kainą.
    public function calculateFullSum()
    {
        $sum = 0;
        foreach ($this->products()->withTrashed()->get() as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public static function eraseOrderSum()
    {
        session()->forget('full_order_sum');
    }

    public static function changeFullSum($changeSum)
    {
        $sum = self::getFullSum() + $changeSum;
        session(['full_order_sum' => $sum]);
    }

//    Funkcija "getFullSum" naudojama skaičiuoti krepšelio užsakymo bendrąją kainą. Tai daroma pereinant per visus
// produktus krepšelyje ir pridedant kainą už kiekvieną produktą, dauginant ją iš jo kiekio (naudojant
// "getPriceForCount" metodą iš "Product" modelio). Galiausiai, funkcija grąžina visų produktų bendrąją kainą.
    public static function getFullSum()
    {
        return session('full_order_sum', 0);
    }

    public function saveOrder($name, $phone)
    {
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }
}
