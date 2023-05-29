<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'imagem',
    ];

    protected $table = 'usuarios';

    public function areas()
    {
        return $this->hasMany(Area::class);
    }
}
