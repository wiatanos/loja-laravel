<!DOCTYPE html>
<html>
<head>
  <title>@yield('titulo')</title>
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
  <section id="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categorias
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach ($categorias as $categoria)
              <a class="dropdown-item" href="{{ url('categoria/'.$categoria->id) }}">{{$categoria->nome}}</a>                  
              @endforeach
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('carrinho') }}">Carrinho <span class="badge badge-primary">{{ \session('carrinho') ? count(\session('carrinho.produtos')) : '0' }} </span> </a>
          </li>
      </ul>
      <ul class="navbar-nav">
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          <li class="nav-item">
            @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">Criar Conta</a>
            @endif
          </li>
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <a class="dropdown-item" href="{{ url('painel') }}">Pedidos</a>

            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>

        </li>
        @endguest
      </ul>
      <form method="POST" action="{{ url('produto/pesquisa') }}" class="form-inline my-2 my-lg-0">
        @csrf
        <input name="pesquisa" class="form-control mr-sm-2" type="search" placeholder="Pesquisa..." aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      </form>
    </div>
  </nav>
</section>
<div class="container">
  <div class="row">
    <div class="col-12">@include('layouts.alerts')</div>
  </div>
  @yield('conteudo')
</div>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>