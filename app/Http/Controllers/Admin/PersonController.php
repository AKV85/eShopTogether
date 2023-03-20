<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //Sukuria naują "Person" modelio objektą ir iškviečia jo "paginate()" metodą, kad gautų visus asmenis su puslapiais.
    // Paginate() metodas suskaido visų asmenų sąrašą į puslapius, kiekvieną puslapį sudaro nurodytas elementų skaičius.
    //
    //Sukuria naują puslapio vaizdą (view) naudojant "view()" funkciją ir nurodydamas vaizdo pavadinimą "auth.persons.index".
    // Taip pat paduoda kintamąjį "persons", kuris yra anksčiau sukurtas "Person" modelio objektas, kuris suskaidytas į puslapius.
    //
    //Vartotojui sugeneruojamas HTML kodas naudojant sukurtą puslapio vaizdą. Šis kodas yra grąžinamas vartotojui per HTTP atsakymą.

    public function index()
    {
        $persons = Person::paginate(10);
        return view('auth.persons.index', compact('persons'));
    }

    //Sukuria naują puslapio vaizdą (view) naudojant "view()" funkciją ir nurodydamas vaizdo pavadinimą "auth.persons.create".
    //
    //Vartotojui sugeneruojamas HTML kodas naudojant sukurtą puslapio vaizdą.
    // Šis kodas yra grąžinamas vartotojui per HTTP atsakymą.

    public function create()
    {
        return view('auth.persons.create');
    }


    //Gauti informaciją apie naują asmenį, kurią vartotojas įvedė į formą.
    //
    //Naudodamas "create()" funkciją, įrašo naują asmenį į duomenų bazę.
    //
    //Nukreipia vartotoją į naujo asmenio informacijos puslapį, naudodamas "redirect()"
    // funkciją ir nurodydamas puslapio pavadinimą, kuris yra susietas su kontrolerio metodu "show",
    // kuris rodo vieną asmenį pagal jo ID.
    public function store(Request $request)
    {
        $person = Person::create($request->all());
        return redirect()->route('auth.persons.show', $person);
    }


    //Gauna vieno konkretaus asmenų įrašo informaciją, kurios ID yra perduodamas per URL parametrus.
    //
    //Grąžina asmenį, kuris yra objektas, kaip HTTP atsakymą.
    public function show(Person $person)
    {
        return $person;
    }


    //Funkcijos paskirtis yra grąžinti vaizdą (view), kuris yra susietas su puslapiu "auth.persons.edit",
    // ir perduoti kintamajam "person" reikšmę, kuri yra paimama iš funkcijos argumento.
    //
    //Kai ši funkcija yra iškviesta, ji grąžina vaizdą, kuriame galima redaguoti konkretaus asmenų sąrašo elementą.
    // Tai yra dalis MVC (Model-View-Controller) architektūros, kuri yra naudojama Laravel.
    public function edit(Person $person)
    {
        return view('auth.persons.edit', compact('person'));
    }

    //Funkcijos paskirtis yra atnaujinti konkretaus asmenų sąrašo elemento informaciją.
    // Tai daroma kviečiant "update" metodą iš "Person" objekto ir perduodant "Request" objekto reikšmes.
    // Tai yra svarbu, kadangi "Request"
    // objektas yra sukuriamas, kai yra pateikiamas formos įvedimo laukų turinys,
    // todėl jame yra informacija, kuri buvo pateikta naudotojo.
    public function update(Request $request, Person $person)
    {
        $person->update($request->all());
        return redirect()->route('auth.persons.show', $person);
    }

    //Funkcijos paskirtis yra pašalinti konkretų asmenų sąrašo elementą.
    // Tai daroma kviečiant "delete" metodą iš "Person" objekto.
    //
    //Tada funkcija grąžina redirekto metodą, kuris nukreipia vartotoją į asmenų sąrašo puslapį
    // (route('auth.persons.index')), iš kurio buvo pašalintas asmenų sąrašo elementas.
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('auth.persons.index');
    }
}
