<!--<div class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ms-auto">

      @if (Route::has('login'))        
        @auth                  
        @else
          <a href="{{ route('login') }}" class="nav-link">Log in</a>

          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="nav-link">Registrar</a>
          @endif
        @endauth                     
      @endif

    </div>
  </div>
</div>-->   

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        <a class="nav-link" href="{{ url('category') }}">Categorias</a>
        @guest
          @if (Route::has('login'))
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          @endif
          @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
          @endif
        @else
        <a class="nav-link" href="{{ url('cart') }}"><i class="bi bi-cart"></i></a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ url('edit-profile') }}">Editar Perfil</a></li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </li>
        @endguest
      </div>
    </div>
  </div>
</nav>