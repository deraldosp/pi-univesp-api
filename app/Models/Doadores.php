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
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'cep',
        'telefone',
        'email'
    ];
}
