<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doadores extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'razao_social',
        'cnpj_cpf',
        'telefone',
        'email',
        'cep',
        'endereco',
        'bairro',
        'cidade',
        'uf',
        'data_ult_doacao',
        'valor_ult_doacao',
        'telefone'
    ];

    protected $casts = [
        'data_ult_doacao' => 'datetime:Y-m-d',
    ];
}
