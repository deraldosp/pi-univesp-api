<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntidadeBeneficenteRequest;
use App\Http\Requests\UpdateEntidadeBeneficenteRequest;
use App\Models\EntidadeBeneficente;
use App\Models\EntidadeUnidade;

class EntidadeBeneficenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function unidadesByEntidade(EntidadeBeneficente $entidade) {
        return response()->json($entidade->load('unidades')->unidades);
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
    public function store(StoreEntidadeBeneficenteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EntidadeBeneficente $entidadeBeneficente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EntidadeBeneficente $entidadeBeneficente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEntidadeBeneficenteRequest $request, EntidadeBeneficente $entidadeBeneficente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EntidadeBeneficente $entidadeBeneficente)
    {
        //
    }
}
