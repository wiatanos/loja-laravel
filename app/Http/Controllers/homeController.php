<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index(){
        $data = [
            'produtos'   => app('App\Produto')->all()
        ];
        return view('index', $data);
    }

    public function carrinho(){
        return view('carrinho');
    }

    public function finalizada(){
        return view('compra-concluida');
    }

    public function painel(){
        return view('painel');
    }
}
