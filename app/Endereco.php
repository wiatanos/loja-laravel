<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    //
    protected $table = 'enderecos';
    protected $fillable = [
        'cep',
        'rua',
        'numero',
        'complemento',
        'cidade',
        'estado',
        'user_id'
    ];

    public function usuario(){
        return $this->belongsTo(User::class);
    }
}
