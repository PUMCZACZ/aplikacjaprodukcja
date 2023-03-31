<?php
namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index', [
            'companies' => Company::all(),
        ]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyRequest $request)
    {
        Company::create($request->toData());

        return redirect(route('companies.index'));
    }

    public function edit(Company $company)
    {
        return view('company.edit', [
            'company' => $company,
        ]);
    }

    public function update(Company $company, CompanyRequest $request)
    {
        $attributes = $request->toData();

        $company->update($attributes);

        return redirect(route('companies.index'));
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect(route('companies.index'));
    }
}
