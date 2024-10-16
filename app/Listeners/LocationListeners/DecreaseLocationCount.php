<?php

namespace App\Listeners\LocationListeners;

use App\Events\LocationEvents\DecreaseLocationCount as LocationEventsDecreaseLocationCount;
use App\Models\locations\Location;


class DecreaseLocationCount
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
    public function handle(LocationEventsDecreaseLocationCount $event): void
    {
        $location = Location::find($event->locationId);

        if ($location) {
            // Decrease the count
            $location->count -= $event->decrementAmount;
            $location->save();
        }
    }
}
