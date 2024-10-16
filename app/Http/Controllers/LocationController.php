<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstants\StatusCodeConstant;
use App\Exceptions\LocationExceptions\LocationNotFoundException;
use App\Models\locations\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Services\locations\LocationService;

use function PHPUnit\Framework\isEmpty;

class LocationController extends Controller
{

    public function __construct(private LocationService $locationService) {}
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
    public function store(StoreLocationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * 
     * Get Location Details By Qr Code
     * @param string $qrCode
     * @return void
     */
    public function showByQrCode(string $qrCode)
    {
        try {
            $locationData = $this->locationService->getLocationDataByQrCode($qrCode);
            return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'Location data fetched successfully!', 'data' => $locationData]);
        } catch (LocationNotFoundException $ex) {
            return response()->json(['status' => $ex->getCode(), 'message' => $ex->getMessage(), 'data' => []]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
