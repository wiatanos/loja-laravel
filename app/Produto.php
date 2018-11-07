<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $table = 'produtos';
    protected $fillable = ['nome', 'detalhe', 'img', 'valor', 'categoria_id'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function pedidos(){
        return $this->belongsToMany(Produto::class, 'pedidos_produtos', 'pedido_id', 'produto_id');
    }
}
