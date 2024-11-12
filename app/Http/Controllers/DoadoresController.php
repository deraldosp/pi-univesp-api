<?php

namespace App\Http\Controllers;

use App\Models\Doadores;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse {
        $perPage = $request->query('perpage', 10);
        $page = $request->query('page', 1);
        if ($request->has('search')) {
            $withSearch = explode('|', $request->search);
            $doadores = Doadores::where($withSearch[0], 'like', '%' .$withSearch[1] . '%')->paginate($perPage, ['*'], 'page', $page);
        } else {
            $doadores = Doadores::paginate($perPage, ['*'], 'page', $page);
        }
        return response()->json($doadores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $doador = new Doadores();
        $doador->fill($request->all());
        $doador->save();

        return response()->json($doador, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doadores $doador): JsonResponse {
        return response()->json($doador);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doadores $doador) {
        $doador->fill($request->all());
        $doador->save();

        return response()->json($doador);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doadores $doador) {
        $doador->delete();

        return response()->json(null, 204);
    }
}
