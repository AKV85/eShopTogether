<?php
//
//namespace App\Http\Controllers\Admin;
//
//use App\Http\Controllers\Controller;
//use App\Http\Requests\CategoryRequest;
//use App\Models\Category;
//
//class CategoriesController extends Controller
//
//{
//Tai yra funkcija, vadinama "index()", kuri grąžina kategorijų sąrašą (Category::all()) ir atvaizduoja jį peržiūros
// šablone (view()) vardu "categories.index", paduodant kategorijų sąrašą kaip kintamąjį 'categories'. Kadangi visas
// kodas yra užkomentuotas, jis yra ignoruojamas ir nevykdomas.
//
//    public function index()
//    {
//        $categories = Category::all();
//        return view('categories.index', ['categories' => $categories]);
//    }
//Tai yra funkcija, vadinama "store()", kuri sukuria naują kategoriją duomenų bazėje, naudodama informaciją, kurią
// gauna iš "CategoryRequest" objekto, kuris yra Laravel karkaso klasė, skirta validuoti ir apdoroti kategorijų
// duomenis. Po to, kai nauja kategorija yra sukurta, funkcija peradresuoja vartotoją į kategorijos informacijos rodymo
// puslapį, kurio maršrutas yra 'categories.show' ir paduodant naujos kategorijos identifikatorių kaip antrąjį
// parametrą. Tai leidžia vartotojui peržiūrėti naują sukurtą kategoriją, kurią jie ką tik sukūrė.
//
//    public function store(CategoryRequest $request)
//    {
//        $categories = Category::create($request->all());
//        return redirect()->route('categories.show', $categories);
//    }
//
//Tai yra funkcija, vadinama "create()", kuri atvaizduoja kategorijos sukūrimo formą peržiūros šablone (view()) vardu
//"categories.create". Tai leidžia vartotojui įvesti naujos kategorijos duomenis, pvz., jos pavadinimą, aprašymą ir
// pan. Atvaizduojant šią formą, vartotojas gali pasiruošti kategorijos sukūrimui, kai jie paspaudžia mygtuką
// "Pateikti" arba "Išsaugoti". Tai yra viena iš CRUD (Create, Read, Update, Delete) operacijų, kurios yra labai dažnai
// naudojamos internetinėse programose.
//
//    public function create()
//    {
//        return view('categories.create');
//    }
//Tai yra funkcija, vadinama "show()", kuri grąžina kategorijos informaciją, kuri yra paduodama kaip parametras
// funkcijai. Ši funkcija gali būti naudojama, kad vartotojas galėtų peržiūrėti vieną kategoriją, pasirinktą iš visų
// esamų kategorijų. Kai vartotojas pasirenka kategoriją, maršrutas nukreipia jį į "categories.show" puslapį, kuriame
// yra ši funkcija, kuri grąžina kategorijos informaciją peržiūros šablone (view()) vardu "categories.show". Kadangi
// kategorijos informacija yra paduodama funkcijai kaip parametras, funkcija gali naudoti "Compact" funkciją, kad ją
// perduotų peržiūros šablonui. Tai leidžia vartotojui matyti kategorijos informaciją, pvz., jos pavadinimą, aprašymą
// ir pan., ir ją redaguoti arba ištrinti. Tai yra viena iš CRUD (Create, Read, Update, Delete) operacijų, kurios yra
// labai dažnai naudojamos internetinėse programose.
//
//    public function show(Category $category)
//    {
//        return view('categories.show', compact('category'));
//    }
//Tai yra funkcija, vadinama "edit()", kuri grąžina kategorijos redagavimo formą peržiūros šablone (view()) vardu
// "categories.edit". Ši funkcija yra skirta leisti vartotojui redaguoti esamą kategoriją, kurios informacija yra
// paduodama kaip parametras funkcijai. Kadangi kategorijos informacija yra paduodama funkcijai kaip parametras,
// funkcija gali naudoti "Compact" funkciją, kad ją perduotų peržiūros šablonui. Tai leidžia vartotojui matyti
// kategorijos informaciją, pvz., jos pavadinimą, aprašymą ir pan., ir ją redaguoti. Kai vartotojas paspaudžia mygtuką
// "Pateikti" arba "Išsaugoti", nauja informacija yra išsaugojama duomenų bazėje, kad vartotojas galėtų matyti
// atnaujintą informaciją kategorijos rodymo puslapyje. Tai yra viena iš CRUD (Create, Read, Update, Delete) operacijų,
// kurios yra labai dažnai naudojamos internetinėse programose.
//
//    public function edit(Category $category)
//    {
//        return view('categories.edit', compact('category'));
//    }
//Ši funkcija atnaujina kategorijos informaciją pagal duomenis, gautus iš užklausimo (CategoryRequest) ir atnaujina
// esamą kategoriją (Category) su šiais duomenimis. Grąžina naršyklę į kategorijos informacijos puslapį
// (categories.show), kuriame rodoma atnaujinta informacija apie kategoriją.
//
//    public function update(CategoryRequest $request, Category $category)
//    {
//        $category->update($request->all());
//        return redirect()->route('categories.show', $category);
//    }
//Ši funkcija naudojama norint ištrinti kategoriją, kuri yra perduodama kaip parametras. Ji ištrina kategorijos įrašą
// iš duomenų bazės naudojant "delete" metodą. Po to, naršyklė yra nukreipiama į kategorijų sąrašo puslapį
// (categories.index).
//
//    public function destroy(Category $category)
//    {
//        $category->delete();
//        return redirect()->route('categories.index');
//    }
//}
