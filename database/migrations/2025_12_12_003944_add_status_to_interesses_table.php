<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('interesses', function (Blueprint $table) {
            $table->enum('status', ['pendente', 'aprovado', 'rejeitado'])
                  ->default('pendente')
                  ->after('infoadicional'); // Adiciona após o campo infoadicional
        });
    }

    public function down(): void
    {
        Schema::table('interesses', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};