<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'imagem',
    ];

    protected $table = 'categorias';

    public function itens()
    {
        return $this->hasMany(Item::class);
    }
}
