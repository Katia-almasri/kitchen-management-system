<?php

namespace App\Listeners\LocationListeners;

use App\Events\LocationEvents\IncreaseLocationCount as LocationEventsIncreaseLocationCount;
use App\Models\locations\Location;

class IncreaseLocationCount
{
    /**
     * Create the event listener.
     */
    public function __construct(LocationEventsIncreaseLocationCount $event)
    {
        $location = Location::find($event->locationId);

        if ($location) {
            // Increase the count
            $location->count += $event->increasementAmount;
            $location->save();
        }
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }
}
