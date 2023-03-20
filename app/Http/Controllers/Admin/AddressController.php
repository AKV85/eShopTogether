<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

   // Paima visas adresų informacijas iš "Address" modelio ir sujungia jas su susijusiu vartotoju,
    // naudodamas "with" funkciją.
    // Šis užklausos rezultatas yra saugomas kintamajame "addresses".
    //
    //Sukuria vaizdą su pavadinimu "auth.addresses.index" ir perduoda jame kintamąjį "addresses",
    // kuris yra apdorotas tam tikru būdu ir rodo tam tikrą kiekį adresų puslapyje naudojant puslapiavimą.

    public function index()
    {
        $addresses = Address::query()->with(['user'])->get();
        return view('auth.addresses.index',['addresses'=>Address::orderBy("id")->paginate(6)]);
    }

    //Sukuria vaizdą su pavadinimu "auth.addresses.create". Tai yra adreso kūrimo forma, kuri yra susietą su šiuo metodą.
    //
    //Grąžina šį vaizdą į kliento naršyklę, kad jis galėtų jį peržiūrėti ir užpildyti reikiamus duomenis.

    public function create()
    {
        return view('auth.addresses.create');
    }


    //Patikrina ar užklausa yra validi, t.y. ar laukai yra teisingi, naudojant "AddressRequest" klasę,
    // kuri yra susijusi su šiuo metodu.
    //
    //Sukuria naują "Address" objektą, naudojant visus parametrus, perduotus per POST užklausą.
    // Tai apima visus duomenis, kurie buvo suvesti į adresų kūrimo formą.
    //
    //Įrašo naują adresą į duomenų bazę, naudojant "create" metodą, ir grąžina naują sukurtą "Address" objektą,
    // kuris yra saugomas kintamajame "address".
    //
    //Pereina į "show" metodą, kuris atvaizduoja naują adresą, naudojant "redirect" ir "route" funkcijas.
    // Ši funkcija perduoda URL adresą, kuris yra susijęs su "show" metodu, ir naują sukurtą "Address" objektą.

    public function store(AddressRequest $request)
    {
        $address = Address::create($request->all());
        return redirect()->route('auth.addresses.show', $address);
    }


//Priima "Address" objektą kaip parametrą. Šis objektas yra adresas, kuris bus rodomas peržiūros lange.
//
//Sukuria vaizdą su pavadinimu "auth.addresses.show". Tai yra adreso peržiūros langas, kuris yra susietas su šiuo metodu.
//
//Perduoda "Address" objektą į šį vaizdą kaip kintamąjį "address".
//
//Grąžina šį vaizdą į kliento naršyklę, kad jis galėtų jį peržiūrėti ir pamatyti informaciją apie adresą.

    public function show(Address $address)
    {
        return view('auth.addresses.show', ['address' => $address]);
    }



//Priima "Address" objektą kaip parametrą. Šis objektas yra adresas, kuris bus redaguojamas.
//
//Sukuria vaizdą su pavadinimu "auth.addresses.edit". Tai yra adreso redagavimo forma, kurios langas yra susietas su šiuo metodu.
//
//Perduoda "Address" objektą į šį vaizdą, naudojant "compact" funkciją. Tai sukuria asociatyvų masyvą,
// kuriame "address" yra masyvo raktas ir "Address" objektas yra jo reikšmė.
// Šis masyvas yra perduodamas į vaizdą, kad jis galėtų būti naudojamas adreso reikšmių užpildymui redagavimo formoje.
//
//Grąžina šį vaizdą į kliento naršyklę, kad jis galėtų jį peržiūrėti ir redaguoti adresą.
    public function edit(Address $address)
    {
        return view('auth.addresses.edit', compact('address'));
    }

//Priima "Request" objektą kaip pirmąjį parametrą. Šis objektas yra HTTP užklausos objektas,
// kuris gali turėti naujas adreso reikšmes iš redagavimo formos.
//
//Priima "Address" objektą kaip antrąjį parametrą. Šis objektas yra adresas, kuris bus atnaujintas naujomis reikšmėmis.
//
//Iškviečia "update" metodą "Address" objektui ir perduoda naujas reikšmes iš "Request" objekto,
// naudodamas funkciją "$request->all()". Tai atnaujina "Address" objektą naujomis reikšmėmis.
//
//Nukreipia vartotoją į "show" metodą, kad jis galėtų peržiūrėti atnaujintą adresą.
//
//Naudoja funkciją "redirect()->route()", kad nukreiptų vartotoją į adreso peržiūros metodą,
// kuris yra nurodytas pavadinimu "auth.addresses.show" ir priklauso tam pačiam kontroleriui.
// Parametras "$address" yra naudojamas kaip adreso identifikatorius.

    public function update(Request $request, Address $address)
    {
        $address->update($request->all());
        return redirect()->route('auth.addresses.show', $address);
    }


//Priima "Address" objektą kaip parametrą. Šis objektas yra adresas, kuris bus ištrintas iš duomenų bazės.
//
//Iškviečia "delete" metodą "Address" objektui. Tai ištrina "Address" objektą iš duomenų bazės.
//
//Nukreipia vartotoją į "index" metodą, kad jis galėtų peržiūrėti likusius adresus.
//
//Naudoja funkciją "redirect()->route()", kad nukreiptų vartotoją į adresų sąrašo metodą,
// kuris yra nurodytas pavadinimu "auth.addresses.index" ir priklauso tam pačiam kontroleriui.

    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('auth.addresses.index');
    }
}
