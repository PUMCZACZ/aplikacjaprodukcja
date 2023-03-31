<?php
namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index', [
            'companies' => Company::all(),
        ]);
    }
}
