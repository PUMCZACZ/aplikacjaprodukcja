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
        $attributes = request()->validate([
            'name' => ['min:3'],
            'lastname' => ['min:3'],
            'city' => ['required'],
            'status' => ['min:1'],
        ]);
        Client::create($attributes);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $m
     * @return \Illuminate\Http\Response
     */
    public function edit(client $m)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $m
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, client $m)
    {
        //
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
}
