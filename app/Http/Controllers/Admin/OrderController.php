<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 1)->get();
        return view('auth.orders.index', compact('orders'));
    }

//
//    public function store(OrderRequest $request)
//    {
//        $order = Order::create(
//            $request->all()
//            + [
//                'status_id' => Status::query()->where(['type' => 'order', 'name' => 'Naujas'])->first()->id,
//            ],
//        );
//
//        return redirect()->route('orders.show', $order);
//    }
//
//    public function create()
//    {
//        return view('order.create');
//    }
//
    public function show(Order $order)
    {
        return view('auth.order.show', compact('order'));
    }
}
//
//    public function edit(Order $order)
//    {
//        return view('order.edit', compact('order'));
//    }
//
//    public function update(OrderRequest $request, Order $order)
//    {
//        $order->update($request->all());
//        return redirect()->route('orders.show', $order);
//    }
//
//    public function destroy(Order $order)
//    {
//        $order->delete();
//        return redirect()->route('orders.index');
//    }
//}
