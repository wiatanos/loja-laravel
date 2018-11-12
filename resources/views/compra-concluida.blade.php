@extends('layouts.main')
@section('titulo', 'Loja - Inicio')
@section('conteudo')
<section id="compra">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-12">
            <div class="alert alert-light text-center" role="alert">
                <h4 class="alert-heading">Compra Finalizada!</h4>
                <p></p>
                <hr>
                <p class="mb-0">Codigo do Pedido: {{ \session('pedido')['codigo'] }}</p>
                <div class="col-12 justify-content-center mt-2">
                        <a class="btn btn-primary" href="{{ url('painel') }}">Acompanhar pedido</a>
                </div>
            </div>
        </div>
    </section>
@endsection