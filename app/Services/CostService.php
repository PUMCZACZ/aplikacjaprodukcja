<?php

namespace App\Services;

use App\Models\Order;
use App\Money;
use App\OrderTypeEnum;

class CostService
{
    const BAG_COST_MULTIPLIER = 0.015;

    public function getPackingCost(Order $order): int
    {
        if ($order->order_type === OrderTypeEnum::LOOSE) {
            return $this->getLooseCost($order);
        }

        if ($order->order_type === OrderTypeEnum::BAG) {
            return $this->getBagCost($order);
        }

        if ($order->order_type === OrderTypeEnum::BIGBAG) {
            return $this->getBigBagCost($order);
        }
    }

    public function price(Order $order): int
    {
        return $this->getPriceWithoutPackaging($order)
            + $this->getPackingCost($order);
    }

    private function packakingCostPerBag(): int
    {
        $netto = config('prices.netto');
        $bag_packaking_per_ton = config('prices.bag_packaking_per_ton');

        return Money::priceToCents(($netto + $bag_packaking_per_ton) * static::BAG_COST_MULTIPLIER);
    }

    private function getLooseCost(Order $order): int
    {
        throw new \Exception('Not implemented yet');
    }

    private function getBagCost(Order $order): int
    {
        return $order->quantity * $this->packakingCostPerBag();
    }

    private function getBigBagCost(Order $order): int
    {
        throw new \Exception('Not implemented');
    }

    private function getPriceWithoutPackaging(Order $order): int
    {
        return 0;
        if ($order->order_type === OrderTypeEnum::BIGBAG) {
            //
        }
    }
}
