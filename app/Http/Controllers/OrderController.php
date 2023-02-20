<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\TypeOfOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index',[
            'orders' => Order::with('clients')->get(),
            'typeOfOrders' => Order::with('typeOfOrders')->get()
        ]);
    }

    public function create()
    {
        return view('order.create',[
            'clients' => Client::all(),
            'typeOfOrders' => TypeOfOrder::all()
            ]);

    }

    public function store()
    {
        $attributes = $this->validateOrder();

        Order::create($attributes);

        return redirect('/order');
    }

    public function edit(Order $order)
    {
        return view('order.edit',[
            'order' => $order,
            'typeOfOrders' => TypeOfOrder::all()
        ]);
    }
    public function update(Order $order)
    {
        $attributes = $this->validateOrder();

        $order->update($attributes);

        return redirect('/order');
    }

    protected function validateOrder(?Order $order = null): array
    {
        $order ??= new Order();

        return request()->validate([
            'client_id' => ['required'],
            'type_of_order_id' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
        ]);
    }
}
