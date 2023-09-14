<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRanksRequest;
use App\Http\Requests\UpdateRanksRequest;
use App\Models\Ranks;
use Inertia\Inertia;
use Inertia\Response;

class RanksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        return Inertia::render('Ranks/Index', [
            //
        ]);
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
    public function store(StoreRanksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ranks $ranks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ranks $ranks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRanksRequest $request, Ranks $ranks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ranks $ranks)
    {
        //
    }
}
