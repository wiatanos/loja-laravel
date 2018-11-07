<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index(){
        $data = [
            'categorias' => app('App\Categoria')->all(),
            'produtos'   => app('App\Produto')->all()
        ];
        return view('index', $data);
    }

    public function carrinho(){
        $data = [
            'categorias' => app('App\Categoria')->all(),
        ];
        return view('carrinho', $data);
    }
}
