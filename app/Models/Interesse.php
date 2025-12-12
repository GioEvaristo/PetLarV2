<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'telefone',
        'endereco',
        'motivacao',
        'infoadicional',
        'status',
    ];

    // Relacionamento com Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    // Método auxiliar para status formatado
    public function getStatusFormatadoAttribute()
    {
        return match($this->status) {
            'pendente' => 'Pendente',
            'aprovado' => 'Aprovado',
            'rejeitado' => 'Rejeitado',
            default => 'Desconhecido',
        };
    }

    // Método auxiliar para cor do status
    public function getStatusCorAttribute()
    {
        return match($this->status) {
            'pendente' => '#FFA500',
            'aprovado' => '#4CAF50',
            'rejeitado' => '#F44336',
            default => '#9E9E9E',
        };
    }
}