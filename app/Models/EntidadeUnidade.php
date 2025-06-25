<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EntidadeUnidade extends Model
{
    use HasFactory;

    public function entidade(): BelongsTo {
        return $this->belongsTo(EntidadeBeneficente::class, 'entidade_beneficentes_id');
    }
}
