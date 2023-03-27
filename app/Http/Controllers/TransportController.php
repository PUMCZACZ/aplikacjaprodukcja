<?php
namespace App\Http\Controllers;

use App\Http\Requests\TransportRequest;
use App\Models\Order;
use App\Models\Transport;

class TransportController extends Controller
{
    public function index()
    {
        return view('transport.index',[
            'transports' => Transport::all(),
        ]);
    }

    public function create()
    {
        return view('transport.create');
    }

    public function store(TransportRequest $request)
    {
        Transport::create($request->toData());

        return redirect(route('transports.index'));
    }

    public function edit(Transport $transport)
    {
        return view('transport.edit',[
            'transport' => $transport,
        ]);
    }

    public function update(TransportRequest $request, Transport $transport )
    {
        $attributes = $request->toData();

        $transport->update($attributes);

        return redirect(route('transports.index'));
    }

    public function destroy(Transport $transport)
    {
        $transport->delete();

        return redirect(route('transports.index'));
    }
}
