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
        Schema::create('doacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doador_id')->nullable();
            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->unsignedBigInteger('unidade_id')->nullable();
            $table->integer('quantidade')->nullable();
            $table->decimal('valor')->nullable();
            $table->tinyInteger('judicial')->default(0);
            $table->timestamps();
            $table->foreign('unidade_id')->references('id')->on('entidade_unidades');
            $table->foreign('doador_id')->references('id')->on('doadores');
            $table->foreign('tipo_id')->references('id')->on('tipos_doacoes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doacoes');
    }
};
