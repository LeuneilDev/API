<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContainerResource;
use App\Models\Container;
use App\Http\Requests\StoreContainerRequest;
use App\Http\Requests\UpdateContainerRequest;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContainerResource::collection(Container::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContainerRequest $request)
    {
        return ContainerResource::make(Container::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Container $container)
    {
        return ContainerResource::make($container);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContainerRequest $request, Container $container)
    {
        $container->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Container $container)
    // {
    //     //
    // }
}
