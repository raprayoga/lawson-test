<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::with('merchant')->get();
        return view('product.products.products', ['datas' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas['merchants'] = Merchant::all();
        return view('product.products.products_create', ['datas' => $datas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'merchant_id' => 'required|numeric',
        ]);

        unset($request['_token']);

        if (Products::create(request()->all())) {
            return redirect('/product/products')->with('success', 'Berhasil menambahkan');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $product['merchants'] = Merchant::all();
        return view('product.products.products_edit', ['data' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required|string',
            'merchant_id' => 'required|numeric',
        ]);

        unset($request['_token']);
        unset($request['_method']);

        if ($product->update(array_filter($request->all()))) {
            return redirect('/product/products')->with('success', 'Berhasil menambahkan');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        if ($product->delete()) {
            return redirect('/product/products')->with('success', 'Berhasil dihapus');
        } else {
            return redirect('/product/products')->with('error', 'Terjadi kesalahan, silahkan coba lagi');
        }
    }
}
