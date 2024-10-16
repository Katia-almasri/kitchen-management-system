<?php

namespace App\Services\locations;

use App\Exceptions\LocationExceptions\LocationNotFoundException;
use App\Exceptions\LocationExceptions\SubLocationNotFoundException;
use App\Interfaces\ServicesInterfaces\LocationServiceInterface;
use App\Models\locations\SubLocation;
use App\Repositories\KitchenRepository;
use App\Repositories\locations\LocationRepository;
use App\Repositories\locations\SubLocationRepository;
use Illuminate\Database\Eloquent\Collection;

class SubLocationService
{
    public function __construct(protected SubLocationRepository $subLocationRepository) {}

    /**
     * 
     * 
     * @param string $id
     */
    public function getSubLocationDataById($id): SubLocation
    {
        $location = $this->subLocationRepository->getById($id);
        return $location->load(['products', 'location']);
    }
}
