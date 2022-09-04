<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigoMunicipio',
        'nome',
        'status'
    ];

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'codigoBairro');
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
