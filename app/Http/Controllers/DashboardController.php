<?php

namespace App\Http\Controllers;

use App\Models\Distribuicao;
use App\Models\Doacoes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        // doações dos últimos mes
        $user = auth()->user();
        $unidade = $user->unidade()->first();

        $currentMonth = Carbon::now()->month;
        $months = [];

        for ($i = 1; $i <= $currentMonth; $i++) {
            $months[] = [
                "month" => $currentMonth,
                "monthName" => Carbon::createFromDate(null, $i, 1)->translatedFormat('M'),
                "donations" => Doacoes::query()->where('unidade_id', $unidade->id)->whereMonth('created_at', $i)->sum('quantidade'),
                "distributions" => Distribuicao::query()->where('unidade_beneficente_id', $unidade->id)->whereMonth('created_at', $i)->sum('quantidade')
            ];
        }


        return response()->json($months);
    }
}
