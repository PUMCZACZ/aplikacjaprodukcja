<?php

namespace App\Services;

use App\Models\Order;
use App\OrderTypeEnum;

class PackingCostService
{
    const BAGCOSTMULIPLYER = 0.015;
    public function getCost(Order $order): int
    {
        if ($order->order_type === OrderTypeEnum::LOOSE)
        {
            return $this->getLooseCost($order);
        }
        if ($order->order_type === OrderTypeEnum::BAG)
        {
            return $this->getBagCost($order);
        }
    }
    private function packakingCostPerBag(): float
    {
        $netto = config('prices.netto');
        $bag_packaking_per_ton = config('prices.bag_packaking_per_ton');

        return (($netto + $bag_packaking_per_ton) * static::BAGCOSTMULIPLYER);
    }
    private function getLooseCost(Order $order): int
    {
      throw new \Exception('Not implemented yet');
    }

    private function getBagCost(Order $order)
    {
        return $order->quantity * $this->packakingCostPerBag();
    }


}
