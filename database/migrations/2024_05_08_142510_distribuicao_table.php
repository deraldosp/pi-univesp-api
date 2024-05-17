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
        Schema::create('distribuicao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiarios_id')->constrained()->cascadeOnDelete();
            $table->foreignId('beneficios_id')->constrained();
            $table->unsignedBigInteger('unidade_beneficente_id')->nullable();
            $table->date('data_entrega');
            $table->integer('quantidade');
            $table->foreign('unidade_beneficente_id')->references('id')->on('entidade_unidades');
            $table->foreignId('created_by_id')->constrained('users');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribuicao');
    }
};
