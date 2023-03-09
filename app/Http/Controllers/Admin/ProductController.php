<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Ši funkcija grąžina peržiūrimų produktų sąrašą su naudojamais duomenimis. Produktai gaunami iš "Product" modelio
    // naudojant "get" metodą. Galiausiai, perduodamas peržiūrimų produktų sąrašas į atitinkamą "index" vaizdą,
    // naudojant "compact" funkciją.
    public function index()
    {
        $products = Product::get();
        return view('auth.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Ši funkcija grąžina naujos prekės sukūrimo formos vaizdą. Tai yra "create" metodas, kuris naudojamas, kai reikia
    // atvaizduoti naujos prekės sukūrimo formą. Tai padaryta perduodant "form" vaizdo failo pavadinimą per "view"
    // funkciją, kuri leidžia grąžinti reikiamą HTML kodą.
    public function create()
    {
        $categories = Category::get();
        return view('auth.products.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $path = $request->file('image')->store('public/products');
        //Čia yra gaunamas image failas iš POST užklausos, naudojant file() metodą, o po to saugomas nurodytame kataloge
        // (public/products) naudojant store() metodą. Grąžinamas failo kelias yra priskiriamas $path kintamajam.
        $params = $request->all();// Ši eilutė sukuria $params masyvą, kuriame yra visi POST užklausos duomenys.
        $params['image'] = $path; //Čia priskiriamas kelias iki įkelto paveikslėlio $path kintamajam, kad būtų galima jį įrašyti į duomenų bazę.
        Product::create($params);//Ši eilutė sukuria naują Product objektą su $params masyve esančiais laukais ir išsaugo jį duomenų bazėje.
        return redirect()->route('products.index');//Pagal nurodytą maršrutą, vartotojas nukreipiamas atgal į produkto sąrašo puslapį.


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    //"Show" funkcija priima "Product" modelio objektą, kuris yra paduodamas kaip parametras. Tai yra padaryta siekiant
    // gauti konkretaus produkto informaciją iš duomenų bazės. Galiausiai, naudojant "view" funkciją, grąžinamas
    // produkto rodymo puslapis, kuriame rodoma konkretaus produkto informacija, panaudojant "compact" funkciją. Tai
    // yra būdas, kaip padaryti, kad naudotojas galėtų matyti vieną produktą iš visų produktų sąraše, o ne visus
    // produktus.
    public function show(Product $product)
    {
        return view('auth.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    //"Edit" funkcija priima "Product" modelio objektą, kuris yra paduodamas kaip parametras. Tai yra padaryta siekiant
    // gauti informaciją apie redaguojamą prekę iš duomenų bazės. Galiausiai, perduodamas produktas kaip kintamasis į
    // atitinkamą "form" vaizdo failą, naudojant "view" funkciją ir "compact" funkciją. Tai leidžia vartotojui matyti
    // esamos prekės informaciją ir ją redaguoti. Tai yra būdas, kaip leisti vartotojams atnaujinti esamą prekę.
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('auth.products.form', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    //Ši funkcija atnaujina esamą prekę su nauja informacija, kurią įvedė naudotojas į prekės redagavimo formą.
    // "Update" funkcija priima "Request" objektą, kuriame yra nauja prekės informacija, ir "Product" modelio objektą,
    // kuris yra redaguojamas. Naudojant "update" funkciją, atnaujinama prekės informacija ir išsaugoma duomenų bazėje.
    // Galiausiai, naudotojas nukreipiamas į prekių sąrašo puslapį, naudojant "redirect" ir "route" funkcijas. Tai yra
    // būdas patvirtinti, kad prekės informacija buvo sėkmingai atnaujinta ir vartotojas gali matyti visą prekių sąrašą
    // su atnaujinta preke.
    public function update(Request $request, Product $product)
    {
        Storage::delete($product->image);//Ši eilutė naudojama trinti (ištrinti) paveikslėlį, susijusį su konkrečiu
        // produktu, iš failų sistemos. Tai yra metodas iš Laravel Storage klasės, kuris leidžia valdyti failus saugom
        //// aplikacijos diske, kuris gali būti konfigūruojamas naudojant config/filesystems.php konfigūracijos failą.
// Šioje eilutėje delete() metodui perduodamas produkto objekto laukas image, kuris yra kelias iki failo,
// susijusio su tuo produktu, ir jis yra ištrinamas iš failų sistemos, kai funkcija vykdo šią eilutę. Tai naudinga, kai
// norima ištrinti produktą iš duomenų bazės ir visus su juo susijusius failus, kad nebūtų paliktas nepanaudotas failas serverio diske.
        $path = $request->file('image')->store('public/products');
        $params = $request->all();
        $params['image'] = $path;
        $product->update($params);
        return redirect()->route('products.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    //Ši funkcija pašalina pasirinktą produktą iš duomenų bazės. "Destroy" funkcija priima "Product" modelio objektą,
    // kuris yra paduodamas kaip parametras. Tai yra padaryta siekiant gauti informaciją apie trinamą produktą iš
    // duomenų bazės. Naudodama "delete" funkciją, ši funkcija pašalina pasirinktą produktą iš duomenų bazės.
    // Galiausiai, naudotojas nukreipiamas į prekių sąrašo puslapį, naudojant "redirect" ir "route" funkcijas. Tai yra
    // būdas patvirtinti, kad pasirinktas produktas buvo sėkmingai pašalintas ir vartotojas gali matyti prekių sąrašą
    // be šio produkto.
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
