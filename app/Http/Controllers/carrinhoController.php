<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class carrinhoController extends Controller
{
    //
    public function insert(Request $request){
        $produto = app('App\Produto')->find($request->id);
        $produto['quantity'] = $request->quantity?: 1;
        
        if(session()->has('carrinho')){
            if (array_search($produto->id, array_column(session('carrinho.produtos'), 'id')) !== false) {
                return redirect()->back()->with('alert-warning', 'Produto já existe no carrinho');
            }
        }else { session()->put('carrinho.produtos',[]); }
        
        session()->push('carrinho.produtos',$produto);
        Self::totalPrice();
        
        if($request->type == 'comprar'){
            return redirect('carrinho');
        }
        return redirect()->back()->with('alert-success', 'Produto adicionado ao carrinho');
    }
    
    public function quantity(Request $request){

        $produtos = session('carrinho.produtos'); 
        $cart_product = array_search($request->id, array_column($produtos, 'id'));
        $offset = array_keys($produtos)[$cart_product];
        
        $produto = session("carrinho.produtos.$offset");
        $produto['quantity'] = $request->quantity;
        session()->put("carrinho.produtos.$offset",$produto);
        Self::totalPrice();
        return redirect()->back();
    }
    
    public function totalPrice($total = 0){
        foreach(session('carrinho.produtos') as $produto){
            $total = floatval($total)+($produto->valor * $produto->quantity);
        }
        session()->put('carrinho.total_price', $total);
    }
    
    public function remove(Request $request){
        $produtos = session('carrinho.produtos'); 
        $cart_product = array_search($request->id, array_column($produtos, 'id'));
        
        if($cart_product !== false){
            $offset = array_keys($produtos)[$cart_product];
            session()->forget("carrinho.produtos.$offset");
            Self::totalPrice();
        }
        if (!count(session('carrinho.produtos')))
        session()->forget('carrinho');
        
        return redirect()->back()->with('msg', 'Produto removido!');
    }
}
