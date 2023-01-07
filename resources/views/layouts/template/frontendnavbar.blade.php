@if(!Auth::check())
<div class="d-flex fixed-top justify-content-end cabecalho">
    <nav class="navbar navbar-expand-lg navbar-dark p-md-3" id="">
        <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
            <i class="bi bi-list text-light text-center"></i>
        </button>
    
        <div class="collapse navbar-collapse p-0" id="navbarNav">
            <ul class="navbar-nav">
                
                <li class="nav-item mx-1">
                    <a href="#" class="nav-link px-3">Sobre</a>
                </li>
                <li class="nav-item mx-1">
                    <a href="#" class="nav-link px-3">Contato</a>
                </li>
                
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item mx-1">
                            <a href="{{ route('login') }}" class="nav-link px-3">Login</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item mx-3">
                            <a href="{{ route('register') }}" class="nav-link px-3 active" style="background: #62a8ff;">Cadastre-se</a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </nav>
</div>
@endif
