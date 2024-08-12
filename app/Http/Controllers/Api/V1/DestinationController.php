<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationResource;
use App\Models\Destination;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DestinationResource::collection(Destination::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDestinationRequest $request)
    {
        return DestinationResource::make(Destination::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        return DestinationResource::make($destination);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $destination->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Destination $destination)
    // {
    //     //
    // }
}
