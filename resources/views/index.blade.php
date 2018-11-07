@extends('layouts.main')
@section('titulo', 'Loja - Inicio')
@section('conteudo')
<section id="produtos">
    <div class="row d-flex justify-content-center">
        <div class="col-12 mt-5 text-center">
            <h4>Produtos</h4>
        </div>
        @foreach ($produtos as $produto)
        <div class="col-12 col-md-4 mt-2 mb-2">
            <div class="card text-center">
                <img class="card-img-top" src="{{ asset($produto->img) }}" alt="{{$produto->nome}}">
                <div class="card-body">
                    <h5 class="card-title">{{$produto->nome}}</h5>
                    <p class="card-text">{{$produto->detalhe}}</p>
                    <h5>R$ {{ $produto->valor }}</h5>
                    <hr>
                    <a href="{{ url('produto/'.$produto->id) }}" class="card-link">Detalhes</a>
                    <form action="{{ url('carrinho/insert') }}" method="POST">
                        @csrf
                        <input name="id" value="{{ $produto->id }}" hidden>
                        <input name="quantity" value="1" hidden>
                        <button type="submit" href="#" class="btn">Adicionar ao Carrinho</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </section>
    @endsection