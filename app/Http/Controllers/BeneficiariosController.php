<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeneficiariosController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->query('perpage', 10);
        $page = $request->query('page', 1);

        $beneficiario = Beneficiario::paginate($perPage, ['*'], 'page', $page);
        return response()->json($beneficiario);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $beneficiario = new Beneficiario();
        $beneficiario->fill($request->all());
        $beneficiario->created_by_id = Auth::user()->id;
        $beneficiario->save();

        return response()->json($beneficiario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Beneficiario $beneficiario): JsonResponse
    {
        return response()->json($beneficiario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beneficiario $beneficiario)
    {
        $beneficiario->fill($request->all());
        $beneficiario->save();

        return response()->json($beneficiario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beneficiario $beneficiario)
    {
        $beneficiario->delete();

        return response()->json(null, 204);
    }
}
