<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TrackingResource;
use App\Models\Tracking;
use App\Http\Requests\StoreTrackingRequest;
use App\Http\Requests\UpdateTrackingRequest;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TrackingResource::collection(Tracking::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrackingRequest $request)
    {
        return TrackingResource::make(Tracking::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tracking $tracking)
    {
        return TrackingResource::make($tracking);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrackingRequest $request, Tracking $tracking)
    {
        $tracking->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Tracking $tracking)
    // {
    //     //
    // }
}
