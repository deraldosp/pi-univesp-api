<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Distribuicao extends Model
{
    use HasFactory;
    protected $table = 'distribuicao';

    protected $fillable = [
        'beneficiarios_id',
        'beneficios_id',
        'unidade_beneficente_id',
        'data_entrega',
        'quantidade',
        'created_by_id'
    ];

    public function unidade (): BelongsTo {
        return $this->belongsTo(EntidadeUnidade::class, 'unidade_beneficente_id')
            ->select(['id','nome', 'entidade_beneficentes_id'])
            ->with('entidade');
    }

    public function beneficiario (): BelongsTo {
        return $this->belongsTo(Beneficiario::class, 'beneficiarios_id')
            ->select(['id','nome', 'numero_dependentes']);
    }
}
