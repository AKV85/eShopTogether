<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
//
    public function index()
    {
        return view('index');
    }

    public function allProducts(ProductsFilterRequest $request)
    {
//        dd(get_class_methods($request));
        Log::channel('daily')->info($request->ip());
        $productsQuery = Product::with('category');

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productsQuery->$field();
            }
        }

        $products = $productsQuery->paginate(6)->withPath("?".$request->getQueryString());
        return view('allProducts', compact('products'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

//    public function category($code)
//    {
//        $category = Category::where('code', $code)->first();
//
//        return view('category', compact('category'));
//    }
    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function product($category, $productCode)
    {
//        if (Auth::check() && Auth::user()->isAdmin()) {
        $product = Product::withTrashed()->byCode($productCode)->firstOrFail();
        return view('product', compact('product'));
    }
//    }

//Ši funkcija priima du parametrus - "SubscriptionRequest" objektą, kuris yra gaunamas iš vartotojo užpildžius
// prenumeratos formą ir "Product" objektą, su kuriuo susijusi prenumerata.Funkcija sukuria naują "Subscription"
// objektą duomenų bazėje, kuriame saugomas naujas prenumeratoriaus el. pašto adresas ir susijusio produkto id.
//Toliau funkcija nukreipia vartotoją atgal į prieš tai matytą puslapį ir sukuria "success" žinutę, kuri informuoja
// vartotoją, kad jo prenumerata yra sėkmingai užregistruota ir kad jis bus informuojamas, kai prekė, kuriai jis
// prenumeruoja, pasirodys sandėlyje.
    public function subscribe(SubscriptionRequest $request, Product $product)
    {
        Subscription::create([
            'email' => $request->email,
            'product_id' => $product->id,
        ]);

        return redirect()->back()->with('success', __('product.we_will_update'));
    }


//    Ši funkcija skirta keisti nustatytą vartotojo kalbą.Funkcija priima "locale" parametro reikšmę, kuri nurodo
// naują kalbą, kurią vartotojas nori naudoti.Funkcija patikrina, ar nurodyta kalba yra palaikoma (t.y. ar ją galima
// naudoti svetainėje), ir jei ne, naudojama numatytoji svetainės kalba, nurodyta konfigūracijos faile.Tada funkcija
// įrašo naują kalbą į sesiją, naudodama "session" funkciją, kad vartotojas galėtų naudoti naują kalbą kitoje svetainės
// dalyje ar per kitą sesiją.Taip pat funkcija nustato programos lokalę naudodama "App::setLocale()" funkciją, kad
// svetainės vertimai ir formatavimas būtų rodomi tinkamu formatu pasirinktai kalbai.Galiausiai funkcija nukreipia
// vartotoją atgal į prieš tai matytą puslapį, naudojant "redirect()->back()" funkciją.
    public function changeLocale($locale)
    {
        $availableLocales = ['lt', 'en'];
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }
        session(['locale' => $locale]);

        App::setLocale($locale);

        return redirect()->back();
    }
}
