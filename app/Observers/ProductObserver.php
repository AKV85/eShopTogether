<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Sku;
use App\Models\Subscription;

class ProductObserver
{
//    Ši klasė vadinama "ProductObserver". Ji turi vieną viešą funkciją "updating", kuri priima "Product" objektą kaip
// parametrą. Šios funkcijos tikslas yra stebėti, kaip "Product" objektas yra atnaujinamas. Jei atnaujinant produkto
// objektą buvo pakeistas jo "count" kiekis, funkcija palygina naują kiekį su ankstesniu. Jei buvo padidintas iš nulio,
// funkcija kviečia "Subscription" klasės "sendEmailsBySubscription" metodą, kad būtų išsiunčiami el. laiškai visiems,
// kurie yra prenumeratų sąraše, susijusio su šiuo produktu.
    public function updating(Sku $sku)
    {
        $oldCount = $sku->getOriginal('count');

        if ($oldCount == 0 && $sku->count > 0) {
            Subscription::sendEmailsBySubscription($sku);
        }
    }
}
