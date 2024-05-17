<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Beneficiario extends Model
{
    use HasFactory;

    protected $hidden = [ 'created_by_id' ];

    protected $with = [ 'createdBy' ];

    protected $fillable = [
        'nome',
        'rg',
        'cpf',
        'data_nascimento',
        'genero',
        'estado_civil',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'cep',
        'telefone',
        'email',
        'numero_dependentes',
        'created_by_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
