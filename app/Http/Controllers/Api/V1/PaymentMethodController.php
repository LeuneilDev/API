<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentMethodResource;
use App\Models\PaymentMethod;
use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PaymentMethodResource::collection(PaymentMethod::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentMethodRequest $request)
    {
        return PaymentMethodResource::make(PaymentMethod::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentmethod)
    {
        return PaymentMethodResource::make($paymentmethod);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $paymentmethod)
    {
        $paymentmethod->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(PaymentMethod $paymentmethod)
    // {
    //     //
    // }
}
