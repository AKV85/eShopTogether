<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use  Translatable;

    protected $fillable = [
        'status',
        'name',
        'phone',
        'user_id',
        'sum',
    ];

    public function skus()
    {
        return $this->belongsToMany(Sku::class)->withPivot('count', 'price')->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


//    Ši funkcija skirta skaičiuoti bendrą krepšelio sumą, atsižvelgiant į kainą ir kiekį kiekvienoje prekėje. Tai
// daroma apdorojant visas skelbimų eilutes krepšelyje su funkcija getPriceForCount(), kuri grąžina kainą, padaugintą
// iš kiekio. Funkcija withTrashed() užtikrina, kad bus apdorotos ir pašalintos prekės.
//Taigi, ši funkcija skaičiuoja bendrą kainą, kurią vartotojas turi sumokėti už prekes krepšelyje.
    public function calculateFullSum()
    {
        $sum = 0;
        foreach ($this->skus()->withTrashed()->get() as $sku) {
            $sum += $sku->getPriceForCount();
        }
        return $sum;
    }

    public function getFullSum()
    {
        $sum = 0;
        $order = session('order')->skus;

        foreach ($order as $sku) {
            $sum += $sku->price * $sku->countInOrder;
        }
        return $sum;
    }


    public function saveOrder($name, $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->status = 1;
        $this->sum = $this->getFullSum();

        $skus = $this->skus;
        $this->save();

        foreach ($skus as $skuInOrder) {
            $this->skus()->attach($skuInOrder, [
                'count' => $skuInOrder->countInOrder,
                'price' => $skuInOrder->price,
            ]);
        }

        session()->forget('order');
        return true;
    }
}
