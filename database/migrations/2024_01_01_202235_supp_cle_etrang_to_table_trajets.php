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
        Schema::table('trajets', function (Blueprint $table) {
            //
            $table->dropForeign(['horaire_id']);
            $table->dropColumn('horaire_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trajets', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('horaire_id');
            $table->foreign('horaire_id')->references('id')->on('horaires');        });
    }
};
