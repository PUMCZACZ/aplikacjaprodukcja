<?php
namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index', [
            'clients' => Client::with('orders')->paginate(15),
        ]);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(ClientRequest $request)
    {
        Client::create($request->toData());

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

    public function update(Client $client, ClientRequest $request)
    {
        $attributes = $request->toData();

        $client->update($attributes);

        return redirect('/client');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect('/client');
    }
}
