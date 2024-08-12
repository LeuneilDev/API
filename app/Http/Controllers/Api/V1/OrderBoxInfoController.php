<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderBoxInfoResource;
use App\Models\OrderBoxInfo;
use App\Http\Requests\StoreOrderBoxInfoRequest;
use App\Http\Requests\UpdateOrderBoxInfoRequest;

class OrderBoxInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderBoxInfoResource::collection(OrderBoxInfo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderBoxInfoRequest $request)
    {
        return OrderBoxInfoResource::make(OrderBoxInfo::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderBoxInfo $orderboxinfo)
    {
        return OrderBoxInfoResource::make($orderboxinfo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderBoxInfoRequest $request, OrderBoxInfo $orderboxinfo)
    {
        $orderboxinfo->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(OrderBoxInfo $orderboxinfo)
    // {
    //     //
    // }
}
