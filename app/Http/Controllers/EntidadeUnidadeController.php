<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntidadeUnidadeRequest;
use App\Http\Requests\UpdateEntidadeUnidadeRequest;
use App\Models\EntidadeBeneficente;
use App\Models\EntidadeUnidade;
use Illuminate\Http\Request;

class EntidadeUnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
    public function store(StoreEntidadeUnidadeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EntidadeUnidade $entidadeUnidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EntidadeUnidade $entidadeUnidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEntidadeUnidadeRequest $request, EntidadeUnidade $entidadeUnidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EntidadeUnidade $entidadeUnidade)
    {
        //
    }
}
