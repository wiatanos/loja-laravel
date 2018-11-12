<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    protected $table = 'pedidos';
    protected $fillable = ['user_id', 'codigo', 'preco'];

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class);
    }

    public function produtos(){
        return $this->belongsToMany(Produto::class, 'pedidos_produtos', 'pedido_id', 'produto_id');
    }
}
