@if(Session::has('alert-primary'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  {{ Session::get('alert-primary') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('alert-secondary'))
<div class="alert alert-secondary alert-dismissible fade show" role="alert">
  {{ Session::get('alert-secondary') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('alert-success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ Session::get('alert-success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('alert-danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ Session::get('alert-danger') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('alert-warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ Session::get('alert-warning') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('alert-info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  {{ Session::get('alert-info') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('alert-light'))
<div class="alert alert-light alert-dismissible fade show" role="alert">
  {{ Session::get('alert-light') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('alert-dark'))
<div class="alert alert-dark alert-dismissible fade show" role="alert">
  {{ Session::get('alert-dark') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
