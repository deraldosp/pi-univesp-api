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
        $startDateOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $lastDateOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

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

        $distribuicoesPorUnidade = Distribuicao::selectRaw('unidade_beneficente_id, SUM(quantidade) as total_quantidade')
            ->where('data_entrega', '>', $startDate->format('Y-m-d'))
            ->with('unidade')
            ->groupBy('unidade_beneficente_id')
            ->get();

        $familiesCount = Distribuicao::selectRaw('COUNT(DISTINCT beneficiarios_id) as total_families')
            ->whereBetween('data_entrega', [$startDateOfLastMonth->format('Y-m-d'), $lastDateOfLastMonth->format('Y-m-d')])
            ->first();

        // Get all unique families with their beneficiary (which has numero_dependentes)
        $families = Distribuicao::select('beneficiarios_id')
            ->with(['beneficiario:id,numero_dependentes'])
            ->whereBetween('data_entrega', [$startDateOfLastMonth->format('Y-m-d'), $lastDateOfLastMonth->format('Y-m-d')])
            ->groupBy('beneficiarios_id')
            ->get();

        $totalDependents = $families->sum(function($item) {
            return $item->beneficiario->numero_dependentes ?? 0;
        });

        $averageDependents = $families->count() > 0 ? ($totalDependents + (int)$familiesCount->total_families) / $families->count() : 0;

        $data = [
            'donations' => [
                'months' => $donations->pluck('mes'),
                'totals' => $donations->pluck('total')->map(function($value) {
                    return (int)$value;
                })->toArray(),
            ],
            'donationByType' => [
                'types' => $donationByType->pluck('tipo.nome'),
                'quantities' => $donationByType->pluck('total_quantidade')->map(function($value) {
                    return (int)$value;
                })->toArray(),
                'values' => $donationByType->pluck('total_valor')->map(function($value) {
                    return (float)$value;
                })->toArray(),
            ],
            'distributions' => [
                'months' => $distribuicoes->pluck('mes'),
                'totals' => $distribuicoes->pluck('total')->map(function($value) {
                    return (int)$value;
                })->toArray(),
            ],
            'distributionsByUnit' => [
                'units' => $distribuicoesPorUnidade->pluck('unidade.nome'),
                'quantities' => $distribuicoesPorUnidade->pluck('total_quantidade')->map(function($value) {
                    return (int)$value;
                })->toArray(),
            ],
            'families' => [
                'total' => (int)$familiesCount->total_families,
                'averageMembersPerFamily' => number_format($averageDependents, 2),
                'referenceMonths' => $lastDateOfLastMonth->locale('pt_BR')->getTranslatedMonthName('M')
            ]
        ];

        return response()->json($data);

    }
}
