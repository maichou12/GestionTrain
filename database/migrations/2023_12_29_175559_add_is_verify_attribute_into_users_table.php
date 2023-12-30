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
        Schema::table('users', function (Blueprint $table) {


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //attribut is verified avec val par defaut 0
            $table->integer('is_verified')->default(0);
            //code d'activation
            $table->string('activation_code', 255)->nullable();
            //
            $table->string('activation_token', 255)->nullable();
        });
    }
};
