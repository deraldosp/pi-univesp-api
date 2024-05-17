<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entidade_unidades', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('entidade_beneficentes_id')->nullable();
            $table->string('cnpj', 20)->nullable();
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero',10)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('cidade',50)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entidade_unidades');
    }
};
