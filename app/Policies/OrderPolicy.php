<?php
namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    public function update(User $user, Order $order): bool
    {
        return !$order->isCompleted();
    }

    public function create(User $user): bool
    {
        return true;
    }
}
