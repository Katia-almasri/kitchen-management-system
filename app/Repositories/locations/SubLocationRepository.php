<?php

namespace App\Repositories\locations;

use App\Interfaces\BasicRepositoryInterfaces\BasicRepositoryInterface;
use App\Models\Kitchen;
use App\Models\locations\Location;
use App\Models\locations\SubLocation;
use Illuminate\Contracts\Database\Eloquent\Builder;

class SubLocationRepository implements BasicRepositoryInterface
{
    public function getById($id): SubLocation|null
    {
        return SubLocation::find($id);
    }

    public function getByName($name) {}

    public function getAll() {}

    public function create($data) {}

    public function update($id, $data) {}

    public function delete($id) {}

    ######################## CUSTOM METHODS #####################
    public function createIfNotFoundById($id, $data) {}

    public function createIfNotFoundByName($name, $data) {}


    public function updateOrCreateById($id, $data) {}

    public function updateOrCreateByName($name, $data) {}

    ################## Relations ###############################
    public function getByIdWithRelations($id)
    {
        $s = $this->getById($id);
        if (!$s)
            return SubLocation::with(['products', 'location'])->find($id);
        return null;
    }
}
