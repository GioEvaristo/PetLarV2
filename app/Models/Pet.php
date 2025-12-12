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
        'idade_unidade', // ← Adicione
        'descricao',
        'cor',
        'sexo',
        'castrado',
        'vacinado',
        'quaisVacinas',
        'vermifugado',
        'foto',
        'status',
    ];

    // Método para obter idade formatada
    public function getIdadeFormatadaAttribute()
    {
        if (!$this->idade) {
            return 'Não informada';
        }
        
        $unidade = $this->idade_unidade ?? 'meses';
        $valor = $this->idade;
        
        if ($unidade == 'anos') {
            return $valor == 1 ? '1 ano' : $valor . ' anos';
        } else {
            return $valor == 1 ? '1 mês' : $valor . ' meses';
        }
    }

    // Método para converter idade para meses (útil para filtros)
    public function getIdadeEmMesesAttribute()
    {
        if (!$this->idade) {
            return 0;
        }
        
        $unidade = $this->idade_unidade ?? 'meses';
        
        return $unidade == 'anos' ? $this->idade * 12 : $this->idade;
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'disponivel' => '#4CAF50',
            'adotado' => '#2196F3',
            'em_tratamento' => '#FF9800',
            default => '#9E9E9E',
        };
    }

    public function getStatusTextoAttribute()
    {
        return match($this->status) {
            'disponivel' => 'Disponível',
            'adotado' => 'Adotado',
            'em_tratamento' => 'Em Tratamento',
            default => 'Desconhecido',
        };
    }
    // Adicione este método na classe Pet
public function interesses()
{
    return $this->hasMany(Interesse::class);
}
}