<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstants\StatusCodeConstant;
use App\Exceptions\LocationExceptions\SubLocationNotFoundException;
use App\Models\locations\SubLocation;
use App\Http\Requests\StoreSubLocationRequest;
use App\Http\Requests\UpdateSubLocationRequest;
use App\Services\locations\SubLocationService;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class SubLocationController extends Controller
{
    public function __construct(private SubLocationService $subLocationService) {}
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
    public function store(StoreSubLocationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SubLocation $subLocation)
    {
        try {
            $subLocationData = $this->subLocationService->getSubLocationDataById($subLocation['id']);
            return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'Sub Location data fetched successfully!', 'data' => $subLocationData]);
        } catch (SubLocationNotFoundException $ex) {
            return response()->json(['status' => $ex->getCode(), 'message' => $ex->getMessage(), 'data' => []]);
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubLocation $subLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubLocationRequest $request, SubLocation $subLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubLocation $subLocation)
    {
        //
    }
}
