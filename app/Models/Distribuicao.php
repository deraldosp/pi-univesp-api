<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
