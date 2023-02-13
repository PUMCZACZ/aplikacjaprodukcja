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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $m
     * @return \Illuminate\Http\Response
     */
    public function show(client $m)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $m
     * @return \Illuminate\Http\Response
     */
    public function destroy(client $m)
    {
        //
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
