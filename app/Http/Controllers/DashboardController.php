<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function index()
    {
//        if (Auth::user()->can('admin')) {
//            dd('admin');
//        }
//
//        if (Gate::check('admin')) {
//            dd('działam');
//        }

        return view('dashboard.index');
    }
}
