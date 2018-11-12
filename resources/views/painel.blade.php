@extends('layouts.main')
@section('titulo', 'Loja - Painel')
@section('conteudo')
<section id="produtos">
    <div class="row">
        <div class="col-12 mt-5 text-center">
            <h4>Meus Pedidos</h4>
        </div>
        <div class="col-12">
            @foreach (Auth::user()->pedidos as $offset => $pedido)
            <div class="card bg-light mb-3">
                <div class="card-header">Pedido - {{ $offset+1 }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $pedido->codigo }}</h5>
                    <p class="card-text"><b>Produto(s)</b></p>
                    <ul>
                        @foreach ($pedido->produtos as $produto)
                            <li>{{ $produto->nome }}</li>
                        @endforeach
                    </ul>
                    <p class="card-text">Valor: {{ $pedido->preco }}</p>
                </div>
            </div>
            @endforeach
            
        </div>
        
    </section>
    @endsection