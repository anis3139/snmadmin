<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseController;

use App\Http\Requests\StoreBundleCardRequest;
use App\Http\Requests\UpdateBundleCardRequest;
use App\Models\BundleCard;

class BundleCardController extends BaseController
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
     * @param  \App\Http\Requests\StoreBundleCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBundleCardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BundleCard  $bundleCard
     * @return \Illuminate\Http\Response
     */
    public function show(BundleCard $bundleCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BundleCard  $bundleCard
     * @return \Illuminate\Http\Response
     */
    public function edit(BundleCard $bundleCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBundleCardRequest  $request
     * @param  \App\Models\BundleCard  $bundleCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBundleCardRequest $request, BundleCard $bundleCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BundleCard  $bundleCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(BundleCard $bundleCard)
    {
        //
    }
}
