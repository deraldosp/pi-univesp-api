<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoadoresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeneficiariosController;
use App\Http\Controllers\DistribuicaoController;
use App\Http\Controllers\TiposDoacoesController;
use App\Http\Controllers\EntidadeBeneficenteController;
use App\Http\Controllers\BeneficioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/tipos_doacoes', [TiposDoacoesController::class, 'index']);
    Route::get('/beneficios', [BeneficioController::class, 'index']);

    Route::controller(EntidadeBeneficenteController::class)->group(function() {
        Route::get('/entidade_beneficente/{entidade}/unidades', 'unidadesByEntidade');
    });

    Route::controller(BeneficiariosController::class)->group(function() {
        Route::get('/beneficiario', 'index');
        Route::post('/beneficiario' , 'store');
        Route::get('/beneficiario/{beneficiario}', 'show');
        Route::put('/beneficiario/{beneficiario}', 'update');
        Route::delete('/beneficiario/{beneficiario}' , 'destroy');
    });

    Route::controller(DoadoresController::class)->group(function() {
        Route::get('/doadores', 'index');
        Route::post('/doadores' , 'store');
        Route::get('/doadores/{doador}', 'show');
        Route::put('/doadores/{doador}', 'update');
        Route::delete('/doadores/{doador}' , 'destroy');
    });

    Route::controller(DistribuicaoController::class)->group(function() {
       Route::post('/distribuicao', 'takeBenefit');
    });
});


Route::post('/login', [AuthController::class, 'login']);


