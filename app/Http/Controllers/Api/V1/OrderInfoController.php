<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderInfoResource;
use App\Models\OrderInfo;
use App\Http\Requests\StoreOrderInfoRequest;
use App\Http\Requests\UpdateOrderInfoRequest;

class OrderInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderInfoResource::collection(OrderInfo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderInfoRequest $request)
    {
        return OrderInfoResource::make(OrderInfo::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderInfo $orderinfo)
    {
        return OrderInfoResource::make($orderinfo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderInfoRequest $request, OrderInfo $orderinfo)
    {
        $orderinfo->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(OrderInfo $orderinfo)
    // {
    //     //
    // }
}
