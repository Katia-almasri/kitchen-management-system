<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterfaces\BasicRepositoryInterface;
use App\Models\Kitchen;

class KitchenRepository implements BasicRepositoryInterface
{
    public function getById($id): Kitchen
    {
        return Kitchen::findOrF($id);
    }

    public function getByName($name)
    {
        return Kitchen::where('name', $name)->firstOrFail();
    }

    public function getByRestaurantId($restaurantId)
    {
        return Kitchen::where('restaurant_id', $restaurantId)->firstOrFail();
    }


    public function getAll()
    {
        return Kitchen::with('users')->get();
    }


    public function create($data) {}

    public function update($id, $data): Kitchen
    {
        $updatedKitchen = Kitchen::find($id);
        if (is_null($data['name'])) {
            // name the kitchen name as the default name
            $data['name'] = $this->getById($id)->restaurant->name . '_Kitchen';
        }
        $updatedKitchen->update($data);
        return $updatedKitchen;
    }

    public function delete($id) {}

    ######################## CUSTOM METHODS #####################
    public function createIfNotFoundById($id, $data) {}

    public function createIfNotFoundByName($name, $data) {}


    public function updateOrCreateById($id, $data) {}

    public function updateOrCreateByName($name, $data) {}

    ################### WITH RELATIONSHIPS #########################

    public function getUsers(Kitchen $kitchen)
    {
        return Kitchen::find($kitchen->id)->users;
    }
}
