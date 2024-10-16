<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterfaces\BasicRepositoryInterface;
use App\Models\Kitchen;
use App\Models\Product;

class ProductRepository implements BasicRepositoryInterface
{
    public function getById($id) {}

    public function getByName($name) {}
    public function getByQrCode($qrCode)
    {
        return Product::where('qr_code', $qrCode);
    }

    public function getAll() {}

    public function create($data) {}

    public function update($id, $data): Product
    {
        $editedProduct = Product::find($id);
        $editedProduct->update($data);
        return $editedProduct;
    }

    public function delete($id) {}

    ######################## CUSTOM METHODS #####################
    public function createIfNotFoundById($id, $data) {}

    public function createIfNotFoundByName($name, $data) {}


    public function updateOrCreateById($id, $data) {}

    public function updateOrCreateByName($name, $data) {}
}
