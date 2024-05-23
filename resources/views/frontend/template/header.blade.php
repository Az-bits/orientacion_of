<header>
    <nav class="navbar navbar-expand-lg header-dark header-transparent disable-fixed header-demo"
        data-header-hover="dark">
        <div class="container-fluid">
            <div class="col-auto col-lg-2 me-lg-0 me-auto">
                <a class="navbar-brand" href="{{ route('/') }}">
                    <img src="{{ asset('assets/main/images/logo-main.jpg') }}" alt class="default-logo" />
                    <img src="{{ asset('assets/main/images/logo-main.jpg') }}" alt class="alt-logo" />
                    <img src="{{ asset('assets/main/images/logo-main.jpg') }}" alt class="mobile-logo" />
                </a>
            </div>
            <div class="col-auto col-lg-8 menu-order position-static">
                <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown simple-dropdown">
                            <a href="https://www.upea.bo/" target="_blank" class="nav-link">UPEA</a>
                            <i class="fa-solid fa-building-columns"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-auto col-lg-2 text-end lg-ps-0 xs-pe-0">
                <div class="header-icon">
                    <div class="header-button">
                        <a href="{{ route('login') }}" target="_blank"
                            class="btn btn-dark-gray fw-500 btn-small btn-switch-text btn-rounded text-transform-none btn-box-shadow purchase-envato">
                            <span>
                                <span class="btn-double-text" data-text="INICIAR SESIÓN">INICIAR SESIÓN</span>
                                <span><i class="fa-solid fa-right-to-bracket"></i></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
