<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index',[
            'setting' =>Admin::orderBy('id', 'desc')->first()
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(AdminRequest $request)
    {
        Admin::create($request->toData());

        return redirect('/admin');
    }

}
