@include('components.modalAgenda')

<nav class="navbar bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Nome Empresa</a>
        <a class="navbar-brand" href="#">Home</a>
        <a class="navbar-brand" href="#">About</a>
        <a class="navbar-brand" href="#">Outros</a>
        <button type="button" class="navbar-brand btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Agendar</button>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        @auth

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Icone de Perfil - nome usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Suas agendas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Configurações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
                </div>
                </li>
                </ul>
            </div>
        </div>
    </nav>

@endauth

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Ainda não está cadastrado?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Entre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Cadastre-se</a>
            </li>
    </div>
    </li>
    </ul>
</div>
</div>
</nav>
