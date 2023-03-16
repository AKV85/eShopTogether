<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'code' => 'required|min:3|max:255|unique:categories,code',
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:5',
            'description_en' => 'required|min:5',
            'image'   => 'nullable|file|max:10240',
            'name_en' => 'required|min:3|max:255 ',



        ];
//šis kodas tikrina, ar jis yra nurodytas dabartinėje maršruto dalyje. Jeigu taip yra, tada code taisyklės masyvo
// reikšmės prieš sąryšio simbolį . yra pridedama kintamojo id reikšmės prieš tą patį sąryšio simbolį, kadangi šiuo
// atveju yra atnaujinamas egzistuojantis objektas, o ne kuriamas naujas.Pavyzdžiui, jei code taisyklės masyvo reikšmė
// yra 'required|string|max:255', o $this->route()->parameter('category')->id grąžina 2, tada šis kodas paverstų code
// taisyklę į 'required|string|max:255,2'.Šis kodas yra naudojamas, kadangi taisyklės kai kuriais atvejais gali
// priklausyti nuo jau egzistuojančių objektų, kurie yra redaguojami, o ne kuriami iš naujo. Tai yra naudinga, kadangi
// galima užtikrinti, kad objektai turėtų unikalius identifikatorius, nors jie būtų keičiami.

        if ($this->route()->named('categories.update')) {
            $rules['code'] .= ',' . $this->route()->parameter('category')->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Laukas turi buti uzpyldytas',
            'min' => 'Laukas :attribute turi tureti minimum :min simboliu',
            'code.min' => 'Laukas kodas turi tureti ne maziau :min simboliu',
        ];
    }
}
