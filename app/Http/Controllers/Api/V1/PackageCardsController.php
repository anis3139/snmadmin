<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseController;

use App\Http\Requests\StorePackageCardsRequest;
use App\Http\Requests\UpdatePackageCardsRequest;
use App\Models\PackageCards;

class PackageCardsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePackageCardsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageCardsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageCards  $packageCards
     * @return \Illuminate\Http\Response
     */
    public function show(PackageCards $packageCards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageCards  $packageCards
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageCards $packageCards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageCardsRequest  $request
     * @param  \App\Models\PackageCards  $packageCards
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageCardsRequest $request, PackageCards $packageCards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageCards  $packageCards
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageCards $packageCards)
    {
        //
    }
}
