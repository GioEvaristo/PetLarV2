<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'especie',
        'raca',
        'porte',
        'pelagem',
        'idade',
        'descricao',
        'cor',
        'sexo',
        'castrado',
        'vacinado',
        'quaisvacinas',
        'vermifugado',
        'foto',
        'status',
    ];
}