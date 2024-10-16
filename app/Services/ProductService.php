<?php

namespace App\Services;

use App\Events\LocationEvents\DecreaseLocationCount;
use App\Events\LocationEvents\IncreaseLocationCount;
use App\Exceptions\ProductExceptions\ProductNotFoundException;
use App\Interfaces\ConstantsInterface\BaseConstants;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function __construct(protected ProductRepository $productRepository) {}

    /**
     * 
     * get location data by qr code service (sub locations and the linked products)
     * @param string $qrCode
     * @return void
     */
    public function getProductDataByQrCode(string $qrCode): Collection
    {
        $productData = $this->productRepository->getByQrCode($qrCode)->with(['subLocation', 'location'])->get();
        if ($productData->isEmpty())
            throw new ProductNotFoundException();
        return $productData;
    }

    /**
     * 
     * Decrease the quantity of the product by withdraw service
     * @param \App\Models\Product $product
     * @param mixed $data
     * @return Product
     */
    public function withdrawProductQuantityById(Product $product, $data)
    {
        // decrease the quantity from the current product
        $data['quantity'] = $product->quantity - $data['updatedQuantity'];
        $updatedProduct =  $this->productRepository->update($product['id'], $data);
        if ($this->isQuantityZero($product['id'])) {
            // make the product inactive
            $data['status'] = BaseConstants::IN_ACTIVE;
            $updatedProduct = $this->productRepository->update($product['id'], $data);
        }
        // call the event to decrease the location count
        event(new DecreaseLocationCount($updatedProduct['location_id'], $data['updatedQuantity']));
        return $updatedProduct;
    }

    /**
     * 
     * Increase the quantity of the product by returning service
     * @param \App\Models\Product $product
     * @param mixed $data
     * @return Product
     */
    public function returnProductQuantityById(Product $product, $data)
    {
        // increase the quantity from the current product
        $data['quantity'] = $product->quantity + $data['updatedQuantity'];
        $updatedProduct =  $this->productRepository->update($product['id'], $data);

        // call the event to increase the location count
        event(new IncreaseLocationCount($product['location_id'], $data['updatedQuantity'], $product['id'], $data['reason']));
        return $updatedProduct;
    }

    /**
     * 
     * Small Service to check if the quantity of the product is equal to zero
     * @param mixed $id
     * @return bool
     */
    public function isQuantityZero($id)
    {
        $product = Product::find($id);
        return $product->quantity == 0;
    }
}
