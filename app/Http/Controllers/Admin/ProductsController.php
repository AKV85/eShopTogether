<?php
//
//namespace App\Http\Controllers\Admin;
//
//use App\Http\Controllers\Controller;
//use App\Http\Requests\ProductRequest;
//use App\Models\Product;
//use http\Client\Request;
//
//class ProductsController extends Controller
//{
//    public function index()
//    {
//        $products = Product::query()->with(['category', 'status'])->get();
//
//        return view('products.index', compact('products'));
//    }
//
//    public function create(Product $product)
//    {
//        return view('products.create', ['product' => $product]);
//    }
//    public function store(ProductRequest $request)
//    {
//        $request->validate([
//            'category_id' => ['required','integer'],
//            'name' => ['required','string','min:3','max:15'],
//            'code' => ['required','max:255'],
//
//            'description' => ['nullable', 'string'],
//            'image' => ['nullable'],
//            'price' => ['required','integer'],
//
//        ]);
//
//
//        $product = Product::create($request->all());
//
//        // Tikriname, ar užklausa turi failą ir ar jis yra validus paveikslėlio failas
//        if ($request->hasFile('foto')
//            && $request->file('foto')->isValid()) {
//
//            //    // Įkeliame failą į '/tmp' aplanką
//            $image = $request->file('foto');
//
//            // Gaunamas paveikslelio pavadinimas
//            $clientOriginalName = $image->getClientOriginalName();
//
//            // Atlieka/tml/phpHG948fWRFG paveikslelio perkelima i public/img/products
//            $image->move(public_path('img/products'), $clientOriginalName);
//
//            //Si kodo dalis atsakinga uz paveikslelio issaugojima produkto lenteleje
//            $product->image = '/img/products/'. $clientOriginalName;
//            $product->save();}
//
//        return redirect()->route('products.show', $product);
//
//    }
//
//    public function show(Product $product)
//    {
//        return view('products.show', ['product' => $product]);
//    }
//
//    public function edit(Product $product)
//    {
//        return view('products.edit', compact('product'));
//    }
//
//    public function update(ProductRequest $request, Product $product)
//    {
//        $product->update($request->all());
//        return redirect()->route('products.show', $product);
//    }
//
//    public function destroy(Product $product)
//    {
//        $product->delete();
//        return redirect()->route('products.index');
//    }
//}
