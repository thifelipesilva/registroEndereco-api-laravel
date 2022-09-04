<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigoUf',
        'nome',
        'status'
    ];


    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function cidades()
    {
        return $this->hasMany(Bairro::class, 'codigoMunicipio');
    }
}
