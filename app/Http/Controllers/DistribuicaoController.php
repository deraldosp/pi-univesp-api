<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Distribuicao;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DistribuicaoController extends Controller
{
    public function takeBenefit(Request $request) {
        $beneficiario = Beneficiario::find($request->beneficiario_id);
        $data_entrega = Carbon::now();
        $entregaData = [
            'beneficiarios_id' => $request->beneficiario_id,
            'unidade_beneficente_id' => $request->unidade_id,
            'beneficios_id' => $request->tipo_beneficio_id,
            'data_entrega' => $data_entrega,
            'quantidade' => $request->quantidade,
            'created_by_id' => auth()->user()->id
        ];

        $distribuicao = Distribuicao::create($entregaData);
        if ($distribuicao){
            $beneficiario->update([
                'total_beneficios_recebidos' => Distribuicao::query(['beneficiarios_id' => $request->beneficiario_id])->count()
            ]);
        }

        return response()->json(Beneficiario::find($request->beneficiario_id), 200);
    }
}
