<?php

namespace App\Http\Controllers;

use App\Models\Doacoes;
use App\Models\Doadores;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $donation = Doacoes::create($input);

        $doador = Doadores::find($input['doador_id']);
        $doador->data_ult_doacao = Carbon::now();
        $doador->save();

        return response()->json($doador, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doacoes $doacoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doacoes $doacoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doacoes $doacoes)
    {
        //
    }
}
