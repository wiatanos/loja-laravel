<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use DB;
use Auth;

class pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(!Auth::check()){
            return redirect('register')->with('mensagem', 'Quase lá, você só precisa criar uma conta ou fazer <a href="/login">login</a>');            
        }
        DB::beginTransaction();
        try{
            $pedido = new Pedido;
            $pedido->fill([
                'user_id'   => Auth::user()->id,
                'preco'     => \session('carrinho')['total_price'],
                'codigo'    => 'CO'.date('dmy').$pedido->id.rand().'BR'
            ]);
            $pedido->save();
            foreach(\session('carrinho.produtos') as $produto){
                $pedido->produtos()->attach($produto);
            }
            DB::commit();

            \session()->forget('carrinho');

            return redirect('compra-finalizada')->with('pedido', $pedido);
        }catch(Expection $e){
            return response()->json($e);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
