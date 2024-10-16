<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstants\StatusCodeConstant;
use App\Exceptions\KitchenExceptions\CantUpdateKitchenException;
use App\Models\Kitchen;
use App\Http\Requests\StoreKitchenRequest;
use App\Http\Requests\UpdateKitchenRequest;
use App\Services\KitchenService;
use Illuminate\Support\Facades\DB;

class KitchenController extends Controller
{
    public function __construct(private KitchenService $kitchenService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kitchen::get();
        return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'kitchen updated successfully!', 'data' => $data]);
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
    // just for test the kitchen reation response 
    public function store(StoreKitchenRequest $request)
    {
        return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'kitchen updated successfully!', 'data' => []]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kitchen $kitchen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kitchen $kitchen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKitchenRequest $request, Kitchen $kitchen)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            $updatedKitchen = $this->kitchenService->updateKitchen($kitchen['id'], $validatedData);
            if (!$updatedKitchen)
                throw new CantUpdateKitchenException();
            DB::commit();
            return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'kitchen updated successfully!', 'data' => $updatedKitchen]);
        } catch (CantUpdateKitchenException $ex) {
            DB::rollBack();
            return response()->json(['status' => $ex->getCode(), 'message' => $ex->getMessage(), 'data' => null]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kitchen $kitchen)
    {
        //
    }

    public function getUsersBelongToKitchen(Kitchen $kitchen)
    {
        $users = $this->kitchenService->getUsersBelongToKitchen($kitchen);
        return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'kitchen updated successfully!', 'data' => $users]);
    }
}
