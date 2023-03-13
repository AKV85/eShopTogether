<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\App;


//Šis kodas yra PHP kalba ir tai yra Trait pavadinimu Translatable. Trait yra perpanaudojamo kodo gabalas, kuris gali
// būti naudojamas kitų klasių. Trait papildo klasę metodais ir savybėmis.Šiame kode matome, kad Translatable Trait turi
// metodą vadinamą __, kuris leidžia gauti iš objekto reikšmę pagal nurodytą lauką (angliškai ar lietuviškai) pagal
// dabartinę lokalę (kalbą).Kintamasis $originFieldName yra pradinio lauko pavadinimas, o App::getLocale() grąžina
// dabartinę programos lokalę. Jei dabartinė lokalė yra "en", tuomet __ metodas grąžins reikšmę, esančią
// "$originFieldName\_en" lauke, o jei nėra, tai grąžins reikšmę, esančią "$originFieldName" lauke.Jei angliškos
// lokalės reikšmė yra tuščia arba jos nėra, tuomet __ metodas grąžina reikšmę, esančią "$originFieldName" lauke,
// kadangi nėra pateikta vertimo reikšmė anglų kalba.Prieš grąžinant reikšmę, __ metodas patikrina, ar objekte yra
// tokio lauko pavadinimas. Jei lauko pavadinimo nėra, tuomet išmetama klaida, kad nurodyto modelio lauko nėra.
trait Translatable
{
    protected $defaultLocale = 'lt';

    public function __($originFieldName)
    {
        $locale = App::getLocale() ?? $this->defaultLocale;

        if ($locale === 'en') {
            $fieldName = $originFieldName . '_en';
        } else {
            $fieldName = $originFieldName;
        }

        $attributes = array_keys($this->attributes);

        if (!in_array($fieldName, $attributes)) {
            throw new \LogicException('no such attribute for model ' . get_class($this));
        }

        if ($locale === 'en' && (is_null($this->$fieldName) || empty($this->$fieldName))) {
            return $this->$originFieldName;
        }

        return $this->$fieldName;
    }
}
