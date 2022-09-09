<nav class="navbar navbar-expand-lg" style="background-color: #0D2579">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <a href="#" type="button" style="color: white;text-decoration: none; margin-left: 50px">
          TJDV - Programas Acadêmicos
        </a>
      </ul>
      @auth
        <ul class="navbar-nav mb-2 mb-lg-0"> 
          <li class="dropdown" style="margin-right: 70px">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
              Olá, {{auth()->user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Editar</a></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
      @endauth

    </div>
  </div>
</nav>