<?php

namespace App\Http\Controllers;

use App\Models\Distribuicao;
use App\Models\Doacoes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        // doações dos últimos meses
        $startDate = Carbon::now()->startOfYear();

        $donations = Doacoes::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as mes, COUNT(*) as total')
            ->where('created_at', '>', $startDate->format('Y-m-d'))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();


        $donationByType = Doacoes::selectRaw('tipo_id, SUM(quantidade) as total_quantidade, SUM(valor) as total_valor')
            ->where('created_at', '>', $startDate->format('Y-m-d'))
            ->with('tipo')
            ->groupBy('tipo_id')
            ->get();

        $distribuicoes = Distribuicao::selectRaw('DATE_FORMAT(data_entrega, "%m/%Y") as mes, COUNT(*) as total')
            ->where('data_entrega', '>', $startDate->format('Y-m-d'))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $distribuicoesPorUnidade = Distribuicao::selectRaw('unidade_beneficente_id, SUM(quantidade) as total_quantidade')->where('data_entrega', '>', $startDate->format('Y-m-d'))->with('unidade')->groupBy('unidade_beneficente_id')->get();

    }
}
