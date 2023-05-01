<?php

namespace App\Http\Controllers;

use App\Models\Domisili;
use App\Http\Requests\StoreDomisiliRequest;
use App\Http\Requests\UpdateDomisiliRequest;

class DomisiliController extends Controller
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
     * @param  \App\Http\Requests\StoreDomisiliRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDomisiliRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domisili  $domisili
     * @return \Illuminate\Http\Response
     */
    public function show(Domisili $domisili)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domisili  $domisili
     * @return \Illuminate\Http\Response
     */
    public function edit(Domisili $domisili)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDomisiliRequest  $request
     * @param  \App\Models\Domisili  $domisili
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDomisiliRequest $request, Domisili $domisili)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domisili  $domisili
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domisili $domisili)
    {
        //
    }
}
