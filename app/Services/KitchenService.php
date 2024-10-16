<?php

namespace App\Services;

use App\Models\Kitchen;
use App\Repositories\KitchenRepository;

class KitchenService
{
    public function __construct(protected KitchenRepository $kitchenRepository) {}

    public function updateKitchen($id, $updatedData)
    {
        return $this->kitchenRepository->update($id, $updatedData);
    }

    public function getUsersBelongToKitchen(Kitchen $kitchen)
    {
        return $this->kitchenRepository->getUsers($kitchen);
    }
}
