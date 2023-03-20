<?php

namespace App\Models;


use App\Models\Traits\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 *
 * @property int $id
 * @property int $product_id
 * @property int $count
 * @property int $price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Sku extends Model
{
    use SoftDeletes, Translatable;

    protected $fillable = [
        'product_id',
        'count',
        'price',
    ];
    protected $visible = [
        'id',
        'count',
        'price',
        'product_name'
    ];

//"product" funkcija yra Eloquent ORM ryšys su "Product" modeliu, kuris rodo, kad Sku objektas priklauso vienam
// "Product" objektui.
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

//    "scopeAvailable" funkcija yra Eloquent ORM funkcija, kuri apibrėžia papildomą užklausos sąlygą Sku objektų
// paieškai, kad būtų gaunami tik tie, kurių "count" atributas yra didesnis už 0. Šis metodas grąžina "QueryBuilder"
// objektą, kuris leidžia toliau kurti paieškos užklausas.
    public function scopeAvailable($query)
    {
        return $query->where('count', '>', 0);
    }

    //    "propertyOptions" funkcija yra Eloquent ORM ryšys su "PropertyOption" modeliu, kuris rodo, kad Sku objektas yra
// susijęs su daugybe "PropertyOption" objektų per tarpinę lentelę "sku_property_option". "withTimestamps" funkcija
// leidžia automatiškai valdyti laiką, kai sukuriama Sku ir PropertyOption sąsaja.
    public function propertyOptions()
    {
        return $this->belongsToMany(PropertyOption::class, 'sku_property_option')->withTimestamps();
    }

//"isAvailable" funkcija tikrina, ar Sku objektas yra prieinamas (t.y. ar susijęs su produkto objektu nėra trintas ir
// ar "count" atributas yra didesnis už 0).
    public function isAvailable()
    {
        return !$this->product->trashed() && $this->count > 0;
    }

//    "getPriceForCount" funkcija grąžina kainą, atsižvelgiant į kiekį, kuris yra nurodytas tarpinėje lentelėje,
// susiejant Sku su krepšelio objektu. Jei tarpinė lentelė nenurodyta (t.y. Sku nėra susijęs su jokiais krepšelio
// objektais), tai funkcija grąžina "price" atributą.
    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

//"getProductNameAttribute" funkcija yra Eloquent ORM atributas, kuris grąžina Sku objekto produkto pavadinimą.
// Ši funkcija naudojama "append" metode, kad būtų pridėtas naujas atributas "product_name" prie Sku objektų, kuris
// atvaizduoja produkto pavadinimą.
    public function getProductNameAttribute()
    {
        return $this->product->name;
    }
}
