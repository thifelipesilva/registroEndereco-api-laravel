<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigoPessoa',
        'codigoBairro',
        'nomeRua',
        'numero',
        'complemento',
        'cep'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function bairro()
    {
        return $this->belongsTo(Bairro::class);
    }
}
