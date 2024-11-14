<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Doacoes extends Model
{
    use HasFactory;
    protected $fillable = [
        'doador_id',
        'tipo_id',
        'unidade_id',
        'quantidade',
        'valor',
        'judicial',
    ];

    public function doador(): BelongsTo {
        return $this->belongsTo(Doadores::class, 'doador_id');
    }
    public function tipo(): HasOne {
        return $this->hasOne(TiposDoacoes::class, 'tipo_id');
    }
    public function unidade(): HasOne {
        return $this->hasOne(EntidadeUnidade::class, 'unidade_id');
    }
}
