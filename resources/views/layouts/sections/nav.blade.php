<nav>
    <main class="dashboard d-md-flex">
        <aside aria-labelledby="offcanvasExample" class="dashboard__menu offcanvas offcanvas-start" id="offcanvasExample"
            tabindex="-1">
            <figure class="d-flex justify-content-between align-items-center dashboard__menu__logo">
                <div class="d-flex  align-items-center">
                    <img alt="img" class="me-2 dashboard__menu__logo__image" src="{{ asset('img/logo.png') }}">
                    <h5 class="mt-2">Cadastro</h5>
                </div>
                <button aria-label="Close" class="d-md-none close__menu" data-bs-dismiss="offcanvas" type="button">
                    <i class="mt-1 fa-solid fa-xmark fa-lg"></i>
                </button>
            </figure>
            <ul class="dashboard__menu__content">
                <li class="dashboard__menu__item">
                    <a class="dashboard__menu__link" href="{{ url('/') }}">
                        <i class="fa-solid fa-users me-2"></i>
                        Funcionários
                    </a>
                </li>
            </ul>
        </aside>
        <article class="dashboard__content">
            <header
                class="d-flex align-items-center justify-content-between justify-content-md-start dashboard__header">
                <article class="d-flex justify-content-between notification">
                    <div class="mt-1 d-flex align-items-center">
                        <a aria-controls="offcanvasExample" class="d-md-none icon__menu" data-bs-toggle="offcanvas"
                            href="#offcanvasExample" role="button">
                            <i class="mt-1 fa-solid fa-bars fa-xl ms-1 me-3"></i>
                        </a>
                        <i class="me-2 fa-solid fa-circle-user icon_hc"></i>
                        <article>Admin</article>
                    </div>
                </article>
            </header>
            @include('layouts/sections/dashboard')
        </article>
    </main>
</nav>
