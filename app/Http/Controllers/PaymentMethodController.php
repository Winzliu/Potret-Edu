<?php

namespace App\Http\Controllers;

use App\Models\paymentMethod;
use App\Http\Requests\StorepaymentMethodRequest;
use App\Http\Requests\UpdatepaymentMethodRequest;

class PaymentMethodController extends Controller
{
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
    public function store(StorepaymentMethodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(paymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(paymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepaymentMethodRequest $request, paymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(paymentMethod $paymentMethod)
    {
        //
    }
}
