<?php

namespace App\Models;

use App\Mail\SendSubscriptionMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
    protected $fillable = ['email', 'product_id'];

    public function scopeActiveByProductId($query, $productId)
    {
        return $query->where('status', 0)->where('product_id', $productId);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


//    Ši funkcija siunčia prenumeratoriams el. laiškus, susijusius su nauju produkto atsiradimu.Funkcija gauna "Product"
// objektą kaip parametrą, kurio informacija reikalinga prenumeratų nustatymams.Funkcija išrenka visus aktyvius
// prenumeratorius iš "Subscription" modelio, kurie prenumeruoja šį produktą. Tada funkcija praeina per visus šiuos
// prenumeratorius ir siunčia kiekvienam prenumeratoriui el. laišką, kuriame informuojama apie naujai atsiradusią prekę.
//Toliau funkcija pažymi kiekvieną prenumeratą kaip išsiųstą, tai daroma keičiant prenumeratos "status" reikšmę į 1 ir
// išsaugant atnaujintą prenumeratą.Pastaba: Ši funkcija naudoja Laravel karkaso funkcijas "Mail" ir
// "SendSubscriptionMessage", kurios yra skirtos siųsti el. laiškus naudojant nurodytą el. pašto šabloną.
    public static function sendEmailsBySubscription(Product $product)
    {
        $subscriptions = self::activeByProductId($product->id)->get();

        foreach($subscriptions as $subscription) {
            Mail::to($subscription->email)->send(new SendSubscriptionMessage($product));
            $subscription->status = 1;
            $subscription->save();
        }
    }
}
