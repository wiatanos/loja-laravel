<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table = 'categorias';
    protected $fillable = ['nome'];

    public function produtos(){
        return $this->belongsToMany(Produto::class, 'categorias_produtos', 'categoria_id', 'produto_id');
    }
}
