<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseController;

use App\Http\Requests\StoreCardBundleRequest;
use App\Http\Requests\UpdateCardBundleRequest;
use App\Models\CardBundle;

class CardBundleController extends BaseController
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
     * @param  \App\Http\Requests\StoreCardBundleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardBundleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CardBundle  $cardBundle
     * @return \Illuminate\Http\Response
     */
    public function show(CardBundle $cardBundle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CardBundle  $cardBundle
     * @return \Illuminate\Http\Response
     */
    public function edit(CardBundle $cardBundle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCardBundleRequest  $request
     * @param  \App\Models\CardBundle  $cardBundle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardBundleRequest $request, CardBundle $cardBundle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CardBundle  $cardBundle
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardBundle $cardBundle)
    {
        //
    }
}
