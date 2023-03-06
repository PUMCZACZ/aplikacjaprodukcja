<?php
namespace App\Services;

use App\Http\Requests\AdminRequest;

class AdminService
{
//    protected AdminRequest $request;
//
//    public function __construct()
//    {
//        $this->request = new AdminRequest();
//    }
    public function toBrutto(): float
    {
        $request = app()->make(AdminRequest::class);

        return $request->input('netto_price') * 1.27;
    }

    public function bagPackingCostPrice(): float
    {
        $request = app()->make(AdminRequest::class);

        return (($request->input('netto_price') + $request->input('bag_packing_cost_price')) / 1000) * 15;
    }

    public function bigbagPackingCostPrice(): float
    {
        $request = app()->make(AdminRequest::class);

        return ($request->input('netto_price') + $request->input('bag_packing_cost_price')) / 1000; //TODO dodać za tysiac mnożenie przez wagę całkowitą bigbagów
    }

    public function loosePackingCostPrice(): float
    {
        $request = app()->make(AdminRequest::class);

        return ($request->input('netto_price') + $request->input('bag_packing_cost_price')) / 1000;
    }
}
