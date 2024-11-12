<?php

namespace App\Http\Controllers;

use App\Models\TiposDoacoes;
use Illuminate\Http\Request;

class TiposDoacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposDoacoes = TiposDoacoes::all();
        return response()->json($tiposDoacoes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TiposDoacoes $tiposDoacoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TiposDoacoes $tiposDoacoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TiposDoacoes $tiposDoacoes)
    {
        //
    }
}
