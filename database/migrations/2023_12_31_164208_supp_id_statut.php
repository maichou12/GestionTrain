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
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['statut_id']);

            // Supprime la colonne 'nom_colonne'
            $table->dropColumn('statut_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            // Recrée la colonne 'nom_colonne'
            $table->string('statut_id');

            // Recrée la clé étrangère liée à 'nom_colonne'
            $table->foreign('statut_id')->references('id')->on('statut');
        });
    }
};
