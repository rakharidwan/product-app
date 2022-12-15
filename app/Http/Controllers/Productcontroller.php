<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();

        return view('product.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorys = Category::all();

        return view('product.create',['categorys' => $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'product_name' => 'required|max:35|string',
            'image' => 'required|mimes:jpeg,png,jpg|max:1500',
            'category' => 'required|exists:categorys,id',
            'description' => 'nullable|max:65535',
            'stock' => 'required|digits_between:1,5'
        ]);

        $image = $request->file('image')->store('product_image');

        $product = new Product([
            'product_name' => $request->product_name,
            'image' => $image,
            'description' => $request->description,
            'stock' => $request->stock
        ]);

        $product->category()->associate($request->category);
        $product->save();

        return redirect('/product')->with(['status' => 'success', 'message' => 'Create product successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        $categorys = Category::all();

        return view('product.edit',['product' => $product,'categorys' => $categorys]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'product_name' => 'required|max:35|string',
            'image' => 'required|mimes:jpeg,png,jpg|max:1500',
            'category' => 'required|exists:categorys,id',
            'description' => 'nullable|max:65535',
            'stock' => 'required|digits_between:1,5'
        ]);

        $product = Product::findOrFail($id);

        Storage::delete($product->image);
        $image = $request->file('image')->store('product_image');

        $product->update([
            'product_name' => $request->product_name,
            'image' => $image,
            'description' => $request->description,
            'stock' => $request->stock
        ]);

        return redirect('/product')->with(['status' => 'success', 'message' => 'Update product successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();
        Storage::delete($product->image);

        return redirect('/product')->with(['status' => 'success', 'message' => 'Delete product successfully']);
    }
}
