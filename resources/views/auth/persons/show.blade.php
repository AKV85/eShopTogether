

{{--Šis šablonas yra sukurtas tam, kad atvaizduotų asmenų kortelių sąrašą.
Šablono HTML kodas yra suskirstytas į eilutes ir stulpelius, kad būtų lengviau tvarkingai atvaizduoti turinį.
Šis šablonas taip pat naudoja Blade kalbą, kuri leidžia dinamiškai generuoti HTML turinį.--}}

{{--Kiekvienai kortelei yra naudojamas Bootstrap frameworko "card" elementas, kuriame yra asmenų informacija:
pavadinimas, ID, vardas, pavardė, el. pašto adresas, telefono numeris, vartotojas,
sukūrimo ir atnaujinimo datos bei veiksmai
(redagavimas ir šalinimas).--}}

{{--Redagavimo ir šalinimo mygtukai yra sukurti naudojant Bootstrap "tooltipped" ir "waves-effect" klasės,
 kad būtų suteiktas interaktyvumas. Šablonas taip pat naudoja Blade sintaksę,
 kad būtų galima generuoti dinaminį HTML turinį su konkrečiais asmenų duomenimis.--}}

<div class="row">
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <img src="https://picsum.photos/200">
                <span class="card-title">{{ $persons->name }}</span>
            </div>
            <div class="card-content">
                <div>ID: {{$person->id}}</div>
                <p>Name: {{ $person->name }}</p>
                <p>Surname: {{ $person->surname }}</p>
                <p>Email: {{ $person->email }}</p>
                <p>Phone: {{ $person->phone }}</p>
                <p>User: {{ $person->user }}</p>
                <p>Created_at: {{ $person->created_at }}</p>
                <p>Updated_at: {{ $person->updated_at }}</p>
                <p>Actions: {{ $person->actions }}</p>
            </div>
            <div class="card-action">
                <a href="{{ route('persons.edit', $person->id) }}"
                   data-tooltip="Redaguoti"
                   class="tooltipped waves-effect waves-light green btn-small">
                    <i class="tiny material-icons">edit</i>
                </a>
                <form action="{{ route('persons.destroy', $person->id) }}" method="POST">
                    @csrf
                    <button type="submit"data-tooltip="Šalinti"
                            class="tooltipped waves-effect waves-light red btn-small">
                        <i class="tiny material-icons">delete</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
