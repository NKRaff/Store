<div class="sidebar" id="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="{{ url('/') }}" class="simple-text logo-normal">
          Store
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Painel de Controle</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('categories','add-category') ? 'active':'' }} {{ Request::is('add-category') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('categories') }}">
              <i class="bi bi-folder"></i>
              <p>Categorias</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('products') ? 'active':'' }} {{ Request::is('add-products') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('products') }}">
              <i class="bi bi-box-seam"></i>
              <p>Produtos</p>
            </a>
          </li>

          <li class="nav-item {{ Request::is('cupons') ? 'active':'' }} {{ Request::is('add-cupons') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('cupons') }}">
              <i class="bi bi-ticket"></i>
              <p>Cupons</p>
            </a>
          </li>

          <li class="nav-item {{ Request::is('orders') ? 'active':'' }} {{ Request::is('add-cupons') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('orders') }}">
              <i class="bi bi-cart"></i>
              <p>Pedidos</p>
            </a>
          </li>

          <li class="nav-item {{ Request::is('users') ? 'active':'' }} {{ Request::is('add-cupons') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('users') }}">
              <i class="bi bi-people"></i>
              <p>Usuários</p>
            </a>
          </li>
          
          <li class="nav-item {{ Request::is('logout') ? 'active':'' }}">
          
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="bi bi-box-arrow-right"></i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </div>