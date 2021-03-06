@extends('layouts.main')
@section('title', 'Carrinho')
@section('conteudo')
<section id="carrinho">
    <div class="row">
        @if(\session('carrinho'))
        <div class="card mt-5">
            <table class="table table-hover shopping-cart-wrap">
                <thead class="text-muted">
                    <tr>
                        <th scope="col" width="100">Produto</th>
                        <th scope="col" width="120">Quantidade</th>
                        <th scope="col" width="120">Valor</th>
                        <th scope="col" width="200" class="text-right"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (\session('carrinho.produtos') as $produto)
                        <tr>
                            <td>
                                <figure class="media">
                                    <div class="img-wrap col-3"><img src="{{ asset($produto->img) }}" class="img-thumbnail img-sm"></div>
                                    <figcaption class="col-9 media-body">
                                        <h6 class="title text-truncate">{{ $produto->nome }}</h6>
                                    </figcaption>
                                </figure> 
                            </td>
                            <td> 
                                <form method="POST" action="{{ url('carrinho/quantity') }}">
                                    @csrf
                                    <input name="id" value="{{$produto->id}}" hidden>
                                    <select name="quantity" class="form-control">
                                        @for ($i = 1; $i < 5; $i++)
                                            <option {{($produto->quantity == $i) ? 'selected' : null }} >{{$i}}</option>
                                        @endfor
                                    </select>
                                </form>
                            </td>
                            <td> 
                                <div class="price-wrap"> 
                                    <var class="price">R$ {{ $produto->valor }}</var> 
                                    <small class="text-muted">(Unidade)</small> 
                                </div>
                            </td>
                            <td class="text-right"> 
                                <form method="POST" action="{{ url('carrinho/remove') }}">
                                    @csrf
                                    <input name="id" value="{{$produto->id}}" hidden>
                                    <button href="" class="btn btn-outline-danger"> × Remover</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th class="text-left"><h6>Total: R$ {{ \session('carrinho.total_price') }}</h6></th>
                        <th class="text-right">
                            <form action="{{url('pedido')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-success">Finalizar Compra</button>
                            </form>
                        </th>
                    </tr>
                </tfoot>
            </table>
            
        </div> <!-- card.// -->
        @else
        <div class="col-12">
                <div class="alert alert-light text-center" role="alert">
                        <h4 class="alert-heading">Seu carrinho está vazio!</h4>
                        <p>Ooops! Parece que você não adicionou produtos ao seu carrinho</p>
                        <hr>
                        <a class="btn btn-outline-primary" href="{{ url('/') }}">Ver Produtos</a>
                    </div>
        </div>
        
        @endif
    </div>
</section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('form > select').on('change', function(e){
                $(e.currentTarget).parent('form').submit();
            })
        })
    </script>
@endpush