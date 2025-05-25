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
         Schema::table('users', function (Blueprint $table): void {
            $table->unsignedBigInteger('unidade_id')->nullable()->after('email');
            $table->foreign('unidade_id')->references('id')->on('entidade_unidades');
            $table->dropForeign('users_entidade_id_foreign');
            $table->dropColumn('entidade_id');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropForeign('users_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });
    }
};
