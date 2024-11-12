<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EntidadeBeneficente extends Model
{
    use HasFactory;
    public function unidades(): HasMany {
        return $this->hasMany(EntidadeUnidade::class, 'entidade_beneficentes_id');
    }
}
