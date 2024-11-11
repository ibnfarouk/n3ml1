<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        session()->put([
//            'products' => [
//                [
//                    'name' => "item1",
//                    "desc" => "kza",
//                    "price" => 10,
//                    "category" => "Cloths"
//                ],
//                [
//                    'name' => "item2",
//                    "desc" => "kza 2",
//                    "price" => 15,
//                    "category" => "Food"
//                ],
//            ]
//        ]);
        //dd(session()->all());
        // array of products [['name' => "kza", 'desc' => 'kza kza']]
        $products = session()->get('products', []);
        return view('products.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // validation
        // Validator -- validator()->make()
//        $validator = validator($request->all(),[
//            'name' => ['required','alpha'],
//            'desc' => 'required'
//        ]);
//        //
//        if ($validator->fails()){
//            dd($validator->errors());
//        }
//        dd("pass");
//        $request->validate([
//            'name' => ['required','alpha','unique:products,f_name'],
//            'desc' => 'required'
//        ],[
////            'name.required' => 'The product name is required'
//        ]);

//        dd($request->validated());
        // store product
        session()->push('products',$request->validated());
//        dd(session()->all());
        // return redirect index
        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!isset(session('products')[$id])){
            abort(404);
        }
        $product = session('products')[$id];
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!isset(session('products')[$id])){
            abort(404);
        }
        $product = session('products')[$id];

        return view('products.edit', compact('product','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $products = session('products');
        $data = $request->validated();
        $products[$id] = $data;
        session()->put('products', $products);
        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
