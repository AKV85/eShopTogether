<?php

namespace App\Models;

use App\Models\Property;
use App\Models\Traits\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property string $image
 * @property Category $category
 * @property string $price
 * @property int $new
 * @property int $hit
 * @property int $recommend
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */
class Product extends Model
{
    use SoftDeletes, Translatable;

    protected $fillable = [
        'category_id',
        'name',
        'code',
        'description',
        'image',
        'price',
        'hit',
        'new',
        'recommend',
        'count',
        'name_en',
        'description_en',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_product')->withTimestamps();
    }

    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code);
    }

    public function scopeNew($query)
    {
        return $query->where('new', 1);
    }

    public function scopeHit($query)
    {
        return $query->where('hit', 1);
    }

    public function scopeRecommended($query)
    {
        return $query->where('recommended', 1);
    }

//Kodas naudojamas nustatant naują produktą kaip atributą.
//"setNewAttribute" funkcija yra atributas, priklausantis produktų modeliui. Ji nustato naujo produkto reikšmę
// atitinkamam laukui, kai kuris nors iš formos laukų yra pateiktas.
//Funkcija priima vieną parametrą - $value, ir priskiria naujo produkto reikšmę atitinkamam atributui. Šiuo atveju,
// $value tikrinama, ar lygi "on", o jei taip, atributui "new" priskiriama reikšmė 1, kitu atveju - 0.
//Tokia funkcija naudojama, kai norima tvarkyti produkto naujumo atributą, kuris yra laikomas boolean tipo atributu,
// tačiau jo reikšmė gaunama iš formos lauko "checkbox" tipo, todėl reikia atlikti vertės konvertavimą.
    public function setNewAttribute($value)
    {
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    public function setHitAttribute($value)
    {
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }

    public function setRecommendAttribute($value)
    {
        $this->attributes['recommend'] = $value === 'on' ? 1 : 0;
    }

    public function isHit()
    {
        return $this->hit === 1;
    }

    public function isNew()
    {
        return $this->new === 1;
    }

    public function isRecommend()
    {
        return $this->recommend === 1;
    }
}
