<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants = Merchant::with('city')->get();
        return view('product.merchant.merchant', ['datas' => $merchants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas['cities'] = City::all();
        return view('product.merchant.merchant_create', ['datas' => $datas]);
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
            'merchant_name' => 'required|string|unique:merchant,merchant_name',
            'city_id' => 'required|numeric',
            'address' => 'required|string',
            'phone' => 'required|string',
            'expired_date' => 'required|string',
        ]);

        unset($request['_token']);

        if (Merchant::create(request()->all())) {
            return redirect('/product/merchant')->with('success', 'Berhasil menambahkan');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant)
    {
        $merchant['cities'] = City::all();
        return view('product.merchant.merchant_edit', ['data' => $merchant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchant $merchant)
    {
        $request->validate([
            'merchant_name' => 'required|string',
            'city_id' => 'required|numeric',
            'address' => 'required|string',
            'phone' => 'required|string',
            'expired_date' => 'required|string',
        ]);

        unset($request['_token']);
        unset($request['_method']);

        if ($merchant->update(array_filter($request->all()))) {
            return redirect('/product/merchant')->with('success', 'Berhasil menambahkan');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        if ($merchant->delete()) {
            return redirect('/users')->with('success', 'Berhasil dihapus');
        } else {
            return redirect('/users')->with('error', 'Terjadi kesalahan, silahkan coba lagi');
        }
    }
}
