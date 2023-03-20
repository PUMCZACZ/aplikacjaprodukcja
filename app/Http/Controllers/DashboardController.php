<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Transport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        $order = Order::first();

        if (Auth::user()->can('super', $order)) {
            dd('wszystko ok');
        } else {
            dd('nie ma uprawnień');
        }

        return view('dashboard.index');
    }
}
