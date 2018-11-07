<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    protected $table = 'pedidos';
    protected $fillable = ['user_id'];

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function produtos(){
        return $this->belongsToMany(Produto::class, 'pedidos_produtos', 'pedido_id', 'produto_id');
    }
}
