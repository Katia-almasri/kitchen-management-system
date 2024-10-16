<?php

namespace App\Services\locations;

use App\Exceptions\LocationExceptions\LocationNotFoundException;
use App\Interfaces\ServicesInterfaces\LocationServiceInterface;
use App\Repositories\KitchenRepository;
use App\Repositories\locations\LocationRepository;
use Illuminate\Database\Eloquent\Collection;

class LocationService
{
    public function __construct(protected LocationRepository $locationRepository) {}

    /**
     * 
     * get location data by qr code service (sub locations and the linked products)
     * @param string $qrCode
     * @return void
     */
    public function getLocationDataByQrCode(string $qrCode): Collection
    {
        $locationData = $this->locationRepository->getByQrCode($qrCode)->with(['subLocations', 'products'])->get();
        if ($locationData->isEmpty())
            throw new LocationNotFoundException();
        return $locationData;
    }
}
