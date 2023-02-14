<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index', [
            'clients' => Client::with('orders')->get()
        ]);
    }


    public function create()
    {
        return view('client.create');
    }

    public function store()
    {
        Client::create(array_merge($this->validateClient()));

        return redirect('/client');
    }

    public function show($id)
    {
        $client = Client::with('orders')->find($id);
        return view('client.show')->with('client', $client);
    }

    public function edit(Client $client)
    {
        return view('client.edit', ['client' => $client]);
    }

    public function update(Client $client)
    {
        $attributes = $this->validateClient();

        $client->update($attributes);

        return redirect('/client');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect('/client');
    }
    protected function validateClient(?Client $client = null): array
    {
        $client ??= new Client();

        return request()->validate([
            'name' => ['min:3'],
            'lastname' => ['min:3'],
            'city' => ['required'],
            'status' => ['min:1'],
        ]);
    }
}
