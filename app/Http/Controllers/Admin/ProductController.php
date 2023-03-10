<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
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
        return view('auth.products.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Ši funkcija sukuria naują produktą pagal paduotus duomenis ($request) ir nukreipia vartotoją į produktų sąrašo
    // puslapį. Funkcija gauna duomenis iš $request objekto, kuris yra HTTP užklausos duomenų rinkinys, ir sukuria
    // naują produktą naudojant Product modelio create() metodą. Galiausiai funkcija nukreipia vartotoją į produktų
    // sąrašo puslapį,kur galima matyti, kad naujas produktas buvo sėkmingai sukurtas.

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
     * @param  \App\Models\Product  $product
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    //"Edit" funkcija priima "Product" modelio objektą, kuris yra paduodamas kaip parametras. Tai yra padaryta siekiant
    // gauti informaciją apie redaguojamą prekę iš duomenų bazės. Galiausiai, perduodamas produktas kaip kintamasis į
    // atitinkamą "form" vaizdo failą, naudojant "view" funkciją ir "compact" funkciją. Tai leidžia vartotojui matyti
    // esamos prekės informaciją ir ją redaguoti. Tai yra būdas, kaip leisti vartotojams atnaujinti esamą prekę.
    public function edit(Product $product)
    {
        return view('auth.products.form', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    //Ši funkcija atnaujina produkto ($product) informaciją pagal paduotus duomenis ($request) ir nukreipia vartotoją į
    // produktų sąrašo puslapį.Funkcija gauna duomenis iš $request objekto, kuris yra HTTP užklausos duomenų rinkinys,
    // ir atnaujina produkto informaciją naudojant Product modelio update() metodą. Galiausiai funkcija nukreipia
    // vartotoją į produktų sąrašo puslapį, kur galima matyti, kad produkto informacija buvo sėkmingai atnaujinta.
    public function update(ProductRequest $request, Product $product){


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
        $product->update($request->all());

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
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
