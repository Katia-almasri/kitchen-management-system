<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstants\StatusCodeConstant;
use App\Exceptions\ProductExceptions\CantUpdateProductException;
use App\Exceptions\ProductExceptions\CantUpdateProductQuantityException;
use App\Exceptions\ProductExceptions\ProductNotFoundException;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateReturnProductRequest;
use App\Http\Requests\UpdateWithdrawProductRequest;
use App\Services\ProductService;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct(private ProductService $productService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    public function showByQrCode(string $qrCode)
    {
        try {
            $productData = $this->productService->getProductDataByQrCode($qrCode);
            return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'product data fetched successfully!', 'data' => $productData]);
        } catch (ProductNotFoundException $ex) {
            return response()->json(['status' => $ex->getCode(), 'message' => $ex->getMessage(), 'data' => []]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }


    /**
     * 
     * Withdraw some quantity from the product and reflect that in the location count
     * @param \App\Http\Requests\UpdateWithdrawProductRequest $request
     * @param \App\Models\Product $product
     * @throws \App\Exceptions\ProductExceptions\CantUpdateProductException
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function withdrawProduct(UpdateWithdrawProductRequest $request, Product $product)
    {
        try {
            $validatedData = $request->validated();
            DB::beginTransaction();
            $updatedProduct = $this->productService->withdrawProductQuantityById($product, $validatedData);
            if (!$updatedProduct)
                throw new CantUpdateProductException();
            DB::commit();
            return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'product quanatity updated successfully!', 'data' => $updatedProduct]);
        } catch (CantUpdateProductException $ex) {
            DB::rollBack();
            return response()->json(['status' => $ex->getCode(), 'message' => $ex->getMessage(), 'data' => null]);
        }
    }

    public function returnProduct(UpdateReturnProductRequest $request, Product $product)
    {
        try {

            $validatedData = $request->validated();
            DB::beginTransaction();
            $updatedProduct = $this->productService->returnProductQuantityById($product, $validatedData);
            if (!$updatedProduct)
                throw new CantUpdateProductException();
            DB::commit();
            return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'product quanatity updated successfully!', 'data' => $updatedProduct]);
        } catch (CantUpdateProductException $ex) {
            DB::rollBack();
            return response()->json(['status' => $ex->getCode(), 'message' => $ex->getMessage(), 'data' => null]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
