<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    //Šis kodas yra atsakingas už validacijos taisyklių nustatymą ir autorizacijos tikrinimą
    // norint atnaujinti asmenį (person) sistemoje.
    // PersonUpdateRequest yra formos užklausos klasė, kuri turi būti iškviečiama,
    // kai naudotojas nori atnaujinti asmenį duomenų bazėje.
    // authorize metodas tiesiog grąžina true, nes autorizacijos tikrinimas yra atliekamas kitur sistemoje.
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    //rules metodas nustato taisykles, kurioms asmuo turi atitikti atnaujinant savo informaciją
    // (pvz., vardas, pavardė, el. paštas ir telefono numeris).
    // Tai yra būdas patikrinti, ar nauji duomenys yra teisingi ir galiojantys prieš juos įtraukiant į duomenų bazę.
    public function rules(): array
    {
        return [
            'name'          => ['required', 'string', 'min:3', 'max:255'],
            'surname'       => ['required', 'string', 'min:3', 'max:255'],
            'email'         => ['required', 'email'],
            'phone'         => ['nullable', 'string', 'min:4', 'max:255'],
        ];
    }
}
