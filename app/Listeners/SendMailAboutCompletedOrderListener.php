<?php

namespace App\Listeners;

use App\Events\OrderWasCompletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendMailAboutCompletedOrderListener implements ShouldQueue
{
    public function handle(OrderWasCompletedEvent $event): void
    {
        Log::info("Wysyłam maila o treści: " . $event->order->id);
    }
}
