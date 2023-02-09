<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index',[
            'orders' => Order::with('clients')->get()
        ]);
    }

    public function create()
    {
        return view('order.create',[
            'clients' => Client::all()
            ]);

    }

    public function store()
    {
        $attributes = request()->validate([
            'client_id' => ['required'],
            'type_of_order' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'date_of_purchase' => [],
            'is_completed' => []
        ]);
        Order::create($attributes);

        return redirect('/order');
    }
}
