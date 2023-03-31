<?php
namespace App\Repositories;

use App\Events\OrderWasCompletedEvent;
use App\Models\Order;
use Carbon\Carbon;

class OrdersRepository
{
    public function confirm(Order $order): bool
    {
        if ($order->isCompleted()) {
            return false;
        }

        $order->update([
            'completed_at' => Carbon::now(),
        ]);

        event(new OrderWasCompletedEvent($order));

        return true;
    }
}
