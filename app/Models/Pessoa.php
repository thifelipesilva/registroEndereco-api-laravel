<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'sobrenome',
        'idade',
        'login',
        'senha',
        'status'
    ];

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'codigoPessoa');
    }
}
