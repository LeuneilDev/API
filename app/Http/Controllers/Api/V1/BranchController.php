<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BranchResource::collection(Branch::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBranchRequest $request)
    {
        return BranchResource::make(Branch::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return BranchResource::make($branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $branch->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Branch $branch)
    // {
    //     //
    // }
}
