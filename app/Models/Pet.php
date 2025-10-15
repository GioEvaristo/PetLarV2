<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Pet extends Model
{
   protected $fillable =  ['nome', 'especie', 'raca', 'porte', 'pelagem', 'idade', 'cor', 'sexo', 'castrado', 'vacinado', 'quaisvacinas', 'vermifugado', 'descricao', 'foto'];
}
