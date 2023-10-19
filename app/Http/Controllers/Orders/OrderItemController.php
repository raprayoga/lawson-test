<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\MasterStatus;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\Products;
use App\Models\Users;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_item = OrderItem::with(['product', 'user', 'status', 'status.masterstatuses'])->get();
        return view('orders.order_item.order_item', ['datas' => $order_item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas['products'] = Products::all();
        $datas['users'] = Users::all();
        $datas['statuses'] = MasterStatus::all();
        return view('orders.order_item.order_item_create', ['datas' => $datas]);
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
            'quantity' => 'required|numeric',
            'date' => 'required|string',
            'product_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'status_id' => 'required|numeric',
        ]);

        unset($request['_token']);

        if ($order_item = OrderItem::create(request()->all())) {
            OrderStatus::create(['order_id' => $order_item->order_id, 'status_id' => $request->status_id]);
            return redirect('/orders/order-item')->with('success', 'Berhasil menambahkan');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderItem $orderItem)
    {
        $orderItem->load('status');
        $orderItem['products'] = Products::all();
        $orderItem['users'] = Users::all();
        $orderItem['statuses'] = MasterStatus::all();

        return view('orders.order_item.order_item_edit', ['data' => $orderItem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'quantity' => 'required|numeric',
            'date' => 'required|string',
            'product_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'status_id' => 'required|numeric',
        ]);

        unset($request['_token']);
        unset($request['_method']);

        if ($orderItem->update(array_filter($request->all()))) {
            OrderStatus::where('order_id', $orderItem->order_id)->update(['status_id' => $request->status_id]);
            return redirect('/orders/order-item')->with('success', 'Berhasil memperaharui');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderItem $orderItem)
    {
        if ($orderItem->delete()) {
            return redirect('/orders/order-item')->with('success', 'Berhasil dihapus');
        } else {
            return redirect('/orders/order-item')->with('error', 'Terjadi kesalahan, silahkan coba lagi');
        }
    }
}
