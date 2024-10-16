<?php

namespace App\Listeners\ProcessReturnListeners;

use App\Events\LocationEvents\IncreaseLocationCount as LocationEventsIncreaseLocationCount;
use App\Models\ReturnProcess;

class AddNewQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LocationEventsIncreaseLocationCount $event): void
    {
        ReturnProcess::create([
            'name' => '',
            'product_id' => $event->productId,
            'reason' => $event->reson
        ]);
    }
}
