<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRanksRequest;
use App\Http\Requests\UpdateRanksRequest;
use App\Models\Rank;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
            'ranks' => Rank::all()
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
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'tag' => 'required|string|max:50',
        ]);

        $rank = Rank::create([
            'name' => $request->name,
            'description' => $request->description,
            'tag' => $request->tag,
        ]);

        return redirect(route('ranks.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Rank $ranks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rank $ranks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRanksRequest $request, Rank $ranks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rank $ranks)
    {
        //
    }
}
