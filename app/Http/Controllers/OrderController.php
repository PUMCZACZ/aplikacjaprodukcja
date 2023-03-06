<?php
namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Client;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index', [
            'orders' => Order::with('clients')->get(),
        ]);
    }

    public function create()
    {
        return view('order.create', [
            'clients' => Client::all(),
        ]);
    }

    public function store(OrderRequest $request)
    {
        /** @var Order $order */
        $order = Order::create($request->toData());
        $order->recalculatePrices();

        return redirect('/order');
    }

    public function edit(Order $order)
    {
        return view('order.edit', [
            'order' => $order,
        ]);
    }

    public function update(Order $order, OrderRequest $request)
    {
        $attributes = $request->toData();

        $order->update($attributes);
        $order->recalculatePrices();

        return redirect('/order');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect('/order');
    }
}
