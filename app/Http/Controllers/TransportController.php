<?php
namespace App\Http\Controllers;

use App\Models\Transport;

class TransportController extends Controller
{
    public function index()
    {
        return view('transport.index',[
            'transports' => Transport::all(),
        ]);
    }
}
