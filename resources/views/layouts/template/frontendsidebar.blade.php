<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('assets/images/banners/N.png') }}" alt="Logo">
                </span>
                <div class="text header-text">
                    <span class="name">Numismática</span>
                    <span class="subname">Garanhuns</span>
                </div>
            </div>

            <i class="bi bi-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu" id="leftCol">
                <form action="{{ url('searchProduct') }}" method="POST">
                    <li class="search-box">
                    @csrf
                        <button type="submit" class="icon border-0"><i class="bi bi-search icon"></i></button>
                        <input type="search" placeholder="Pesquisar..." id="search_product" name="product_name" aria-describedby="basic-addon1">
                    </li>
                </form>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{ url('/') }}">
                            <i class="bi bi-house icon"></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>

                    <hr>

                    <li class="nav-link">
                        <a href="{{ url('product') }}">
                            <i class="bi bi-grid icon"></i>
                            <span class="text nav-text">Todos Produtos</span>
                        </a>
                    </li>

                    @foreach($category as $scategory)
                        <li class="nav-link">
                            <a href="{{ url('view-category/'.$scategory->name) }}">
                                <i class="bi bi-{{ $scategory->namefile }} icon"></i>
                                
                                <span class="text nav-text">{{ $scategory->name }}</span>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
            @if(Auth::check())
                <div class="buttom-content">
                    <hr>
                    
                    <li class="nav-link">
                        <a href="{{ url('cart') }}">
                            <i class="bi bi-cart icon"></i>
                            <span class="text nav-text">Carrinho</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ url('my-orders') }}">
                            <i class="bi bi-clipboard icon"></i>
                            <span class="text nav-text">Meus Pedidos</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-left text-danger icon"></i>
                            <span class="text nav-text text-danger">Sair</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </div>
            @endif
        </div>
    </nav>