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
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('rg', 20)->nullable();
            $table->string('cpf', 20)->nullable()->unique();
            $table->date('data_nascimento')->nullable();
            $table->string('genero',20)->nullable();
            $table->char('estado_civil',20)->nullable();
            $table->string('endereco');
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->integer('numero_dependentes');
            $table->date('inicio_beneficio')->nullable();
            $table->date('termino_beneficio')->nullable();
            $table->integer('total_beneficios_recebidos')->default(0);
            $table->foreignId('created_by_id')->constrained('users');
            $table->softDeletes();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};
