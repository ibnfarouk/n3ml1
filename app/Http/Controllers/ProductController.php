<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\NationalId;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $product = Product::with(['categories' => function ($query) {

        }])->find(1);
//        $product->load('categories');

        dd($product);
        // eager loading
//        $cats = [3,5,6];
//        $product = Product::find(1);
        // attach
//        $product->categories()->attach([3,6]);
//        $product->categories()->detach([3,6]);
//        $product->categories()->sync([3,4]);
//        $var = $product->categories()->toggle([3,4,6]);

//        $data = Product::where('rate', '>', 4)->orWhereDoesntHave('categories', function ($query){
//            $query->where('name','sed');
//        })->get();
//        dd($data);


        // has - whereHas
        // doesntHave - whereDoesntHave


//        dd($var);

        $products = Product::search()->latest()->with('categories')->paginate(10);
//        dd($products);
//        dd($products->first()->price);
        //dd($products);
        return view('products.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
//        DB::table('products')->insert($request->validated());

//        $product = new Product();
//        $product->name = "TEst";
//        $product->desc = "lorem ipsum";
//        $product->price = 100.99;
//        $product->save();

        $product = Product::create($request->validated());

        $product->categories()->attach($request->categories);

//        dd($product);

        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $isUpdated = $product->update($request->validated());

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back();
    }
}
