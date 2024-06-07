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
                            <a href="javascript:void(0)" class="nav-link" id="historial">HISTORIAL DE PRUEBAS</a>
                            <i class="fa-solid fa-building-columns"></i>
                        </li>
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
<div class="modal fade az-modal" id="modal-historial" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="modal-title">HISTORIAL</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <p class="m-0 text-warning">Ingrese su cedula de identidad para ver sus pruebas:</p>

            <div class="modal-body p-0">
                <div class="row" id="date-student">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="ci2">Cedula de Identidad</label>
                            <input name="ci2" id="ci2" type="text" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-transparent btn-cancelar"
                    data-bs-dismiss="modal">cancelar</button>
                <button type="button" class="btn btn-next historial">Ingresar</button>
            </div>
        </div>
    </div>
</div>
