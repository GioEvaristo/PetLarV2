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
       Schema::create('pets', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('nome');
           $table->string('especie');
           $table->string('raca');
           $table->string('porte');
           $table->string('pelagem');
           $table->integer('idade');
           $table->string('descricao');
           $table->string('cor');
           $table->string('sexo');
           $table->string('castrado');
           $table->string('vacinado');
           $table->string('vermifugado');
           $table->string('quaisVacinas');
           $table->string('foto');
           $table->timestamps();
       });
   }


   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
       Schema::dropIfExists('pets');
   }
};
