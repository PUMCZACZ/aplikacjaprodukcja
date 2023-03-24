<?php
namespace App\Http\Controllers;

use App\Http\Requests\TransportRequest;
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

        return redirect('/transport');
    }
}
