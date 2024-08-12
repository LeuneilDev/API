<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BoxInfoResource;
use App\Models\BoxInfo;
use App\Http\Requests\StoreBoxInfoRequest;
use App\Http\Requests\UpdateBoxInfoRequest;

class BoxInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BoxInfoResource::collection(BoxInfo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoxInfoRequest $request)
    {
        return BoxInfoResource::make(BoxInfo::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(BoxInfo $boxinfo)
    {
        return BoxInfoResource::make($boxinfo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoxInfoRequest $request, BoxInfo $boxinfo)
    {
        $boxinfo->update($request->all());
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(BoxInfo $boxinfo)
    // {
    //     //
    // }
}
