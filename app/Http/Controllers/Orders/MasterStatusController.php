<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\MasterStatus;
use Illuminate\Http\Request;

class MasterStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master_status = MasterStatus::all();
        return view('orders.master_status.master_status', ['datas' => $master_status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.master_status.master_status_create');
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
            'name' => 'required|string|unique:master_status,name',
            'description' => 'required|string',
        ]);

        unset($request['_token']);

        if (MasterStatus::create(request()->all())) {
            return redirect('/orders/master-status')->with('success', 'Berhasil menambahkan');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function show(MasterStatus $masterStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterStatus $masterStatus)
    {
        return view('orders.master_status.master_status_edit', ['data' => $masterStatus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterStatus $masterStatus)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        unset($request['_token']);
        unset($request['_method']);
        if ($masterStatus->update(array_filter($request->all()))) {
            return redirect('/orders/master-status')->with('success', 'Berhasil memperaharui');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterStatus $masterStatus)
    {
        if ($masterStatus->delete()) {
            return redirect('/orders/master-status')->with('success', 'Berhasil dihapus');
        } else {
            return redirect('/orders/master-status')->with('error', 'Terjadi kesalahan, silahkan coba lagi');
        }
    }
}
