<?php

namespace App\Models;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
//    public const COLORS = ['Red', 'Green', 'Blue', 'Black', 'White'];
//    public const SIZES  = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];

    use SoftDeletes;

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
        'count'
    ];

//    public function getCategory()
//    {
//        return Category::find($this->category_id);
//    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Kodas, kuris naudojamas suskaičiuoti kainą pagal produktų kiekį.Funkcija "getPriceForCount" nurodo, kad šis
    // metodas priklauso produktų modeliui, o ne kontroleriui ar kitam klasės objektui. Šis metodas tikrina, ar
    // produktas yra susietas su kiekiu (pvz. ar buvo pridėtas į krepšelį), patikrinant ar "pivot" objektas nėra null.
    // Jei taip, metodas grąžina produktų kiekį padaugintą iš produkto kainos. Jei ne, metodas grąžina paprastą
    // produkto kainą. Toks kodas naudojamas dažnai kai reikalinga apskaičiuoti kainą pagal kiekius, pvz. kai prekių
    // krepšelyje yra daugiau nei vienas produktas ir reikia suskaičiuoti bendrą kainą.
    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
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
//Kodas naudojamas tikrinant, ar produktas yra populiariausias (hit).
//"isHit" funkcija yra metodas, priklausantis produktų modeliui. Šis metodas tikrina, ar produkto "hit" atributas
// lygus 1, t.y. ar produktas yra populiariausias. Jei atributas lygus 1, grąžinama TRUE, kitu atveju - FALSE.
//Tokia funkcija naudojama, kai reikalinga patikrinti, ar produktas yra "hit", ir atitinkamai jį apdoroti, pavyzdžiui,
// rodyti specialiame puslapyje ar išskirti kitais būdais.

    public function isAvailable()
    {
        return !$this->trashed() && $this->count > 0;
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
