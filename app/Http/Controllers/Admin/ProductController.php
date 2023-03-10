<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
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
        $products = Product::paginate(10);
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
    public function store(ProductRequest $request)
    {
        $params = $request->all();

        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('public/products');
        }


        Product::create($params);
        return redirect()->route('products.index');
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

// Kodas naudojamas atnaujinti produkto informaciją. Funkcija "update" priklauso produktų kontroleriui ir naudoja
// "ProductRequest" klasę validacijai. Funkcija priima dvi parametrus: "ProductRequest" objektą, kuris yra naudojamas
// kaip pagrindas atnaujinimo reikalavimams tikrinti ir "Product" objektą, kuris yra atnaujinamas.
//Metodo veikimas yra toks:
//Gauti visus parametrus iš prašymo.
//Išimti "image" parametrą, kad būtų galima atskirai tvarkyti nuotraukos atnaujinimą.
//Patikrinti, ar yra įkeltas naujas vaizdas. Jei taip, ištrinti seną vaizdą ir įkelti naują vaizdą į "public/products"
// direktoriją, o jo kelias išsaugoti naujame "params" masyvo elemente.
//Patikrinti, ar yra "new", "hit" ir "recommend" parametrai, ir jei nėra, priskirti jiems reikšmę 0.
//Atlikti produkto atnaujinimą naudojant "update" metodą ir perduodant "params" masyvą kaip parametrą.
//Grąžinti naršymo sąsają į produktų sąrašo puslapį.
//Tokia funkcija naudojama, kai reikalinga atnaujinti produktų informaciją ir tvarkyti produktų nuotraukas.
    public function update(ProductRequest $request, Product $product)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($product->image);
            $params['image'] = $request->file('image')->store('public/products');
        }

        foreach (['new', 'hit', 'recommend'] as $fieldName) {
            if (!isset($params[$fieldName])) {
                $params[$fieldName] = 0;
            }
        }

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
