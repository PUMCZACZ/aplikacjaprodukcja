<?php

namespace App\Listeners;

use App\Events\OrderWasCompletedEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendSMSAboutShipmentListener implements ShouldQueue
{
    use InteractsWithQueue;
    use Queueable;

    public function handle(OrderWasCompletedEvent $event): void
    {
        Log::info('wysyłam sms do makgazynu');
    }
}
