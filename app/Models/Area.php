<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'descricao',
        'imagem',
    ];

    protected $table = 'areas';

    public function itens()
    {
        return $this->belongsToMany(Item::class)
                    ->withTimestamps();
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}
