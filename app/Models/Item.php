<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'descricao',
        'imagem',
        'categoria_id',
    ];

    protected $table = 'itens';

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class)
                    ->withTimestamps();
    }
}
