<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productData = DB::table('products')->select('id', 'category_id', 'name', 'price', 'photo')->get();
        return view('home', ['productData'=>$productData]);
    }
    public function search(Request $request)
    {
        $searchData = DB::table('products')->select('id', 'category_id', 'name', 'price', 'photo')->where("name", "like", "%$request->search%")->paginate(10);
        $searchValue = $request->search;
        return view('searchView', ['searchData'=>$searchData, 'searchValue'=>$searchValue]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function manageView()
    {
        $productData = DB::table('products')->select('id', 'category_id', 'name', 'photo')->paginate(10);
        return view('manageProduct', ['productData'=>$productData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProductView()
    {
        return view('addProduct');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'photo' => 'required|mimes:jpeg,jpg,png',
        ]);
        $productTemp = new Product();
        $productTemp->name = $request->name;

        $categoryIdTemp = DB::table('categories')->select('id')->where("name", "like", $request->category)->get()->first();
        $productTemp->category_id = $categoryIdTemp->id;

        $productTemp->genre = $request->category;
        $productTemp->description = $request->description;
        $productTemp->price = $request->price;

        $photoName = $request->photo->getClientOriginalName();
        $path = $request->photo->storeAs('public/product', $photoName);
        $productTemp->photo = "../storage/product/$photoName";

        $productTemp->save();
        return redirect('/manageProduct')->with('message', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('productDetail', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateProductView(Request $request)
    {
        $productData = Product::find($request->productID);
        return view('updateProduct', ['productData'=>$productData]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'photo' => 'required|mimes:jpeg,jpg,png',
        ]);
        $productTemp = Product::find($request->productID);
        $productTemp->name = $request->name;

        $categoryIdTemp = DB::table('categories')->select('id')->where("name", "like", $request->category)->get()->first();
        $productTemp->category_id = $categoryIdTemp->id;

        $productTemp->genre = $request->category;
        $productTemp->description = $request->description;
        $productTemp->price = $request->price;

        $photoName = $request->photo->getClientOriginalName();
        $path = $request->photo->storeAs('public/product', $photoName);
        $productTemp->photo = "../storage/product/$photoName";

        $productTemp->save();
        return redirect('/manageProduct')->with('message', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct(Request $request)
    {
        $temp = Product::find($request->deleteData);
        $temp->delete();
        return redirect('/manageProduct');
    }
}
