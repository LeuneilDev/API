<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BoxChargesResource;
use App\Models\BoxCharges;
use App\Http\Requests\StoreBoxChargesRequest;
use App\Http\Requests\UpdateBoxChargesRequest;

class BoxChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BoxChargesResource::collection(BoxCharges::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoxChargesRequest $request)
    {
        return BoxChargesResource::make(BoxCharges::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(BoxCharges $boxcharge)
    {
        return BoxChargesResource::make($boxcharge);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoxChargesRequest $request, BoxCharges $boxcharge)
    {
        $boxcharge->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(BoxCharges $boxcharges)
    // {
    //     //
    // }
}
