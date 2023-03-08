<?php
//
//namespace App\Http\Controllers\Admin;
//
//use Carbon\Carbon;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
//
//Paprastai tokia dokumentacija yra naudojama, kad kitas programuotojas galėtų lengviau suprasti klasės funkcionalumą
// ir teisingai naudoti jos metodus bei savybes.
//
///**
// * @property int $id
// * @property string $name
// * @property string $code
// * @property string $description
// * @property string $image
// * @property Carbon $created_at
// * @property Carbon $updated_at
// * @method static updateOrCreate(string[] $array, array $array1)
// */
//class Category extends Model
//{
//
// Tai yra pagalbinis funkcionalumas, skirtas lengvai kurti ir valdyti modelius.
//$fillable masyvas nurodo, kokie laukai yra leidžiami užpildyti modelyje. Tai apsaugo nuo nepageidaujamų laukų
// užpildymo, kai duomenys yra saugomi duomenų bazėje. Čia nurodyti laukai yra 'name', 'code', 'description', ir 'image'
//
//    use HasFactory;
//
//    protected $fillable = [
//        'name',
//        'code',
//        'description',
//        'image',
//
//    ];
//
//Šis kodas apibrėžia funkciją (metodą) 'parent()', kuri yra naudojama modelyje, kad nustatytų ryšį tarp dviejų
// kategorijų - tarp dabartinės kategorijos ir jos tėvinės kategorijos.
//'belongsTo' funkcija yra ryšio metodas, kuris nustato priklausomumą nuo kito modelio. Šiuo atveju funkcija nustato,
// kad šis modelis priklauso kategorijų modeliui ir turi tėvinę kategoriją.
//Kategorijos modelio klasė yra paduodama kaip pirmasis parametras 'Category::class', o 'parent_id' yra antrasis
// parametras. Tai reiškia, kad šio modelio 'parent_id' stulpelis nurodo tėvinės kategorijos identifikatorių.
//Taigi, 'parent()' funkcija grąžina ryšį tarp šio modelio ir jo tėvinės kategorijos, kuri yra aprašyta kaip 'belongsTo' ryšis.
//
//    public function parent()
//    {
//        return $this->belongsTo(Category::class, 'parent_id');
//    }
//}
//
//
