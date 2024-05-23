<!DOCTYPE html>
<html class="no-js" lang="es_ES">

<head>
    <title>Orientacion Vocacional</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="author" content="ThemeZaa" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" href="{{ asset('/plantilla-test/assets/images/logo/ov-logo.ico') }}" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png" />
    <link rel="stylesheet" href="{{ asset('assets/main/css/vendors.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/main/css/icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/main/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/main/css/responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/main/demos/landing-page/landing-page.css') }}" />
    <style>
        .az-span {
            display: none;
        }

        @media (max-width: 992px) {
            .mobile-logo {
                width: 4rem !important;
                height: 4rem !important;
            }

            .az-bottom-0px {
                bottom: 19rem !important;
                left: 8rem;
                opacity: 0.3;
            }

            .az-text-banner {
                color: rgb(182, 175, 175);
            }

            .az-span {
                display: block;
            }
        }
    </style>
    <style>
        h2.maquina {
            /* font-family: monospace; */
            overflow: hidden;
            white-space: nowrap;
            width: 0;
            animation: maquina-escribir 3.5s linear infinite;
        }

        h2.maquina .linea {
            display: inline-block;
            width: 0;
            animation: linea-escribir 3.5s linear infinite;
        }

        @keyframes maquina-escribir {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes linea-escribir {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }

            0% {
                opacity: 0;
            }

            50% {
                opacity: 50%;
            }

            50% {
                opacity: 100%;
            }
        }
    </style>
</head>

<body class="landing-page" data-mobile-nav-style="classic">
    <header>
        <nav class="navbar navbar-expand-lg header-dark header-transparent disable-fixed header-demo"
            data-header-hover="dark">
            <div class="container-fluid">
                <div class="col-auto col-lg-2 me-lg-0 me-auto">
                    <a class="navbar-brand" href="index.html">
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

    <section class="full-screen ipad-top-space-margin md-h-850px" data-parallax-background-ratio="0.8"
        style="
        /* background-image: url('images/crafto-landing-page-hero-section-img.png'); */
        background-image: radial-gradient(
          at center bottom,
          rgb(255 129 55 / 67%) 0%,
          rgba(255, 230, 55, 0) 84%,
          rgb(3, 5, 16) 84%
        );
      ">
        <div class="container h-100 position-relative">
            <div class="row align-items-start justify-content-center h-100 text-center">
                <div class="col-xl-10 col-lg-12 position-relative z-index-2">
                    <style>
                        h2.maquina {
                            overflow: hidden;
                            white-space: nowrap;
                            width: 100%;
                        }

                        h2.maquina .linea {
                            display: inline-block;
                            width: 0;
                            overflow: hidden;
                            /* animation: maquina-escribir 3.5s linear forwards; */
                            /* Se ejecuta una vez y se mantiene en el estado final */
                            animation: maquina-escribir 3.5s linear infinite;
                            /* Se ejecuta una vez y se mantiene en el estado final */
                        }

                        @keyframes maquina-escribir {
                            0% {
                                width: 0;
                            }

                            100% {
                                width: 100%;
                            }
                        }
                    </style>

                    <div>
                        <h2 class="maquina fw-500 ls-minus-1px mb-20px text-white w-80 xl-w-90 md-w-100 mx-auto mt-2">
                            <!-- Test de Orientación Vocacional CHASIDES -->
                            <span class="linea">
                                <span>Test de</span><br class="az-span" />
                                <span>Orientación</span><br />
                                <span>Vocacional</span><br class="az-span" />
                                <span>CHASIDES</span><br />
                            </span>
                        </h2>
                    </div>
                    <div class="fs-21 lh-32 lg-w-90 mx-auto az-text-banner w-65">
                        El Test de Orientación Vocacional CHASIDE es una herramienta de
                        autoevaluación que ayuda a elegir una carrera universitaria
                        adecuada, evaluando aptitudes, habilidades y clasificando áreas
                        del conocimiento. Su objetivo es facilitar una elección
                        profesional sin complicaciones futuras.
                    </div>

                    <div class="mt-35px position-relative z-index-9">
                        <a href="{{ route('test', ['id' => 1]) }}"
                            class="btn btn-white fw-700 btn-extra-large btn-rounded btn-switch-text ls-0px  btn-box-shadow mb-0 xs-mb-20px me-15px">
                            <span>
                                <span class="btn-double-text" data-text="Test Sovi 3">Test Sovi 3</span>
                            </span>
                        </a>
                        <a href="javascript:void(0)"
                            class="btn btn-white fw-700 btn-extra-large btn-rounded btn-switch-text ls-0px  btn-box-shadow mb-0 xs-mb-20px me-15px">
                            <span>
                                <span class="btn-double-text" data-text="Test Chaside">Test Chaside</span>
                            </span>
                        </a>
                        <a href="javascript:void(0)"
                            class="btn btn-white fw-700 btn-extra-large btn-rounded btn-switch-text ls-0px  btn-box-shadow mb-0 xs-mb-20px me-15px">
                            <span>
                                <span class="btn-double-text" data-text="Test de inteligencia">Test de
                                    inteligencia</span>
                            </span>
                        </a>


                    </div>
                    <div class="mt-35px position-relative z-index-9">
                        <a href="https://www.youtube.com/watch?v=by5cRoUaLtk"
                            class="btn btn-transparent-light-gray border-1 btn-extra-large btn-rounded fw-500 ls-0px btn-switch-text mb-0 xs-mb-20px section-link popup-youtube">
                            <span>
                                <span class="btn-double-text" data-text="Video Tutorial">Video Tutorial</span>
                                <span><i class="bi bi-play-circle-fill"></i></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <section class="position-relative overflow-hidden">
            <div class="container-fluid p-0"
                data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 300, "delay": 100, "staggervalue": 200, "easing": "easeOutQuad" }'>
                +
                <div class="row g-0">
                    <div class="col-12 feature-box-slider">
                        <div class="swiper"
                            data-slider-options='{"slidesPerView": 2, "spaceBetween": 30, "speed": 4500, "loop": true, "allowTouchMove": false, "autoplay": {"delay": 0, "disableOnInteraction": false}, "keyboard": {"enabled": true, "onlyInViewport": true}, "effect": "slide"}'>
                            <div class="swiper-wrapper marquee-slide">
                                <div class="swiper-slide">
                                    <div class="feature-box">
                                        <i class="bi bi-view-list"></i>
                                        <span>Accordion</span>
                                    </div>
                                    <div class="feature-box">
                                        <a href="https://www.youtube.com/watch?v=cfXHhfNy7tU"
                                            class="btn btn-white fw-700 btn-extra-large btn-rounded btn-switch-text ls-0px popup-youtube btn-box-shadow mb-0 xs-mb-20px me-15px">
                                            <span>
                                                <span class="btn-double-text" data-text="Video Tutorial">Video
                                                    Tutorial</span>
                                                <span><i class="bi bi-play-circle-fill"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="feature-box">
                                            <i class="bi bi-mouse"></i>
                                            <span>Button</span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="feature-box">
                                            <i class="bi bi-people"></i>
                                            <span>Team</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section> --}}
        <!-- <div class="position-absolute bottom-0px z-index-2 az-bottom-0px">
              <img
                src="images/upeaLogo.png"
                data-bottom-top="transform: rotate(0) translateY(50px)"
                data-top-bottom="transform:rotate(0) translateY(-50px)"
                alt="UPEA"
              />
            </div> -->
        </div>
        </div>
        </div>
        modal
        <img width="300px" height="300px" src="{{ asset('assets/main/images/upeaLogo.png') }}"
            class="position-absolute top-45 left-100px lg-left-0px z-index-1 animation-float d-lg-block d-none" alt
            data-bottom-top="transform: translateY(-50px)" data-top-bottom="transform: translateY(50px)"
            style="bottom: 9rem;" />
        <div class="position-absolute bottom-0 h-100 left-0px w-100 full-screen z-index-minus-1 cover-background bg-dark-gray"
            style="
          background-image: url('images/crafto-landing-page-hero-section-bg.jpg');
        "></div>
    </section>

    {{-- <section class="position-relative bg-very-light-gray overflow-hidden pb-0">
        <div class="p-0 position-absolute right-minus-50px text-end">
            <img src="images/crafto-landing-page-bg-01.png" class="lg-w-80" alt />
        </div>
        <div class="position-absolute left-minus-50px bottom-minus-50px">
            <img src="images/crafto-landing-page-bg-02.png" class="lg-w-80" alt />
        </div>
        <div class="container position-relative">
            <div class="row align-items-center justify-content-center text-center mb-6 sm-mb-30px">
                <div class="col-xl-10"
                    data-anime='{ "el": "childs", "translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <span
                        class="alt-font d-inline-flex align-items-center bg-gradient-dark-green-light-green fs-14 sm-fs-12 sm-lh-12 fw-600 pt-10px pb-10px ps-30px pe-30px sm-ps-15px sm-pe-15px mb-20px text-white border-radius-100px text-uppercase">
                        <svg class="me-5px" width="18" height="20" viewBox="0 0 18 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_44_3)">
                                <path
                                    d="M14.9485 0.449157C14.3812 0.133854 12.7565 0.32937 10.8041 0.933816C7.38806 3.26899 4.50351 6.70979 4.30249 12.2352C4.26669 12.3674 3.92935 12.2159 3.86189 12.176C2.93938 10.4081 2.57313 8.54654 3.34418 5.86026C3.48738 5.62068 3.01786 5.32603 2.93387 5.41002C2.7659 5.578 2.06094 6.32977 1.59142 7.14075C-0.729987 11.1653 0.788705 16.3245 4.84911 18.5825C5.81455 19.12 6.87642 19.4621 7.97407 19.5892C9.07172 19.7163 10.1837 19.626 11.2464 19.3233C12.3091 19.0207 13.3018 18.5117 14.1679 17.8254C15.0339 17.1391 15.7562 16.289 16.2937 15.3235C18.9097 10.6394 16.4809 1.30557 14.9485 0.449157Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_44_3">
                                    <rect width="18" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        Created by Envato power elite author</span>
                    <h2 class="alt-font fw-700 text-dark-gray ls-minus-2px mb-0">
                        Crafted with exclusive features
                    </h2>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 justify-content-center mb-6 md-mb-50px"
                data-anime='{ "el": "childs", "translateY": [0, 0], "perspective": [1000,1200], "scale": [1.1, 1], "rotateX": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="col md-mb-30px">
                    <div
                        class="box-shadow-quadruple-large box-shadow-quadruple-large-hover border border-2 border-color-white border-radius-8px overflow-hidden">
                        <img src="images/crafto-landing-page-exclusive%20components.jpg" class="w-100" alt />
                        <div class="pb-50px ps-15px pe-15px bg-very-light-gray last-paragraph-no-margin text-center">
                            <span class="d-inline-block text-dark-gray fs-20 fw-600 mb-10px">Exclusive
                                components</span>
                            <p class="mx-auto w-80 xl-w-90 lg-w-90 md-w-100">
                                Crafto includes well designed components which always gives
                                you best results as you wanted.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col md-mb-30px">
                    <div
                        class="box-shadow-quadruple-large box-shadow-quadruple-large-hover border border-2 border-color-white border-radius-8px overflow-hidden">
                        <img src="images/crafto-landing-page-bootstrap-5-x-framework.jpg" class="w-100" alt />
                        <div class="pb-50px ps-15px pe-15px bg-very-light-gray last-paragraph-no-margin text-center">
                            <span class="d-inline-block text-dark-gray fs-20 fw-600 mb-10px">Bootstrap 5.x
                                framework</span>
                            <p class="mx-auto w-80 xl-w-90 lg-w-80 md-w-100">
                                The world's favored front-end open-source toolkit for crafting
                                responsive websites.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div
                        class="box-shadow-quadruple-large box-shadow-quadruple-large-hover border border-2 border-color-white border-radius-8px overflow-hidden">
                        <img src="images/crafto-landing-page-crafting-code-excellence.jpg" class="w-100" alt />
                        <div class="pb-50px ps-15px pe-15px bg-very-light-gray last-paragraph-no-margin text-center">
                            <span class="d-inline-block text-dark-gray fs-20 fw-600 mb-10px">Crafting code
                                excellence</span>
                            <p class="mx-auto w-90 xl-w-100 lg-w-90 md-w-100">
                                Featuring optimized, well-structured, and easily to use and
                                customize code, setting industry standards.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row counter-style-04 justify-content-center mb-5 md-mb-50px"
                data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="col-lg-3 col-sm-4 col-6 text-center md-mb-30px">
                    <div class="feature-box-content">
                        <h3 class="vertical-counter d-inline-flex text-dark-gray ls-minus-1px fw-600 mb-0"
                            data-text="+" data-to="48500"></h3>
                        <span class="d-block text-dark-gray fs-17 lh-26 fw-500">Happy users</span>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 text-center md-mb-30px">
                    <div class="feature-box-content">
                        <h3 class="vertical-counter d-inline-flex text-dark-gray ls-minus-1px fw-600 mb-0"
                            data-text="+" data-to="48"></h3>
                        <span class="d-block text-dark-gray fs-17 lh-26 fw-500">Websites</span>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 text-center md-mb-30px">
                    <div class="feature-box-content">
                        <h3 class="vertical-counter d-inline-flex text-dark-gray ls-minus-1px fw-600 mb-0"
                            data-text="+" data-to="500"></h3>
                        <span class="d-block text-dark-gray fs-17 lh-26 fw-500">Templates</span>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 text-center">
                    <div class="feature-box-content">
                        <h3 class="vertical-counter d-inline-flex text-dark-gray ls-minus-1px fw-600 mb-0"
                            data-text="+" data-to="300"></h3>
                        <span class="d-block text-dark-gray fs-17 lh-26 fw-500">Elements</span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-6 text-center">
                    <div class="feature-box-content">
                        <h3 class="vertical-counter d-inline-flex text-dark-gray ls-minus-1px fw-600 mb-0"
                            data-text="+" data-to="1450"></h3>
                        <span class="d-block text-dark-gray fs-17 lh-26 fw-500">Sections</span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center text-center"
                data-anime='{ "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="col-lg-auto col-sm-2 col-3 md-mb-30px">
                    <a href="#" target="_blank"><img src="images/crafto-landing-page-features-ico-01.png"
                            alt /></a>
                </div>
                <div class="col-lg-auto col-sm-2 col-3 md-mb-30px">
                    <a href="#" target="_blank"><img src="images/crafto-landing-page-features-ico-02.png"
                            alt /></a>
                </div>
                <div class="col-lg-auto col-sm-2 col-3 md-mb-30px">
                    <a href="#" target="_blank"><img src="images/crafto-landing-page-features-ico-03.png"
                            alt /></a>
                </div>
                <div class="col-lg-auto col-sm-2 col-3 md-mb-30px">
                    <a href="#" target="_blank"><img src="images/crafto-landing-page-features-ico-04.png"
                            alt /></a>
                </div>
                <div class="col-lg-auto col-sm-2 col-3 md-mb-30px">
                    <a href="#" target="_blank"><img src="images/crafto-landing-page-features-ico-05.png"
                            alt /></a>
                </div>
                <div class="col-lg-auto col-sm-2 col-3 md-mb-30px">
                    <a href="#" target="_blank"><img src="images/crafto-landing-page-features-ico-06.png"
                            alt /></a>
                </div>
                <div class="col-lg-auto col-sm-2 col-3">
                    <a href="#" target="_blank"><img src="images/crafto-landing-page-features-ico-07.png"
                            alt /></a>
                </div>
                <div class="col-lg-auto col-sm-2 col-3">
                    <a href="#" target="_blank"><img src="images/crafto-landing-page-features-ico-08.png"
                            alt /></a>
                </div>
                <div class="col-lg-auto col-sm-2 col-3">
                    <a href="#" target="_blank"><img src="images/crafto-landing-page-features-ico-09.png"
                            alt /></a>
                </div>
                <div class="col-lg-auto col-sm-2 col-3">
                    <a href="#" target="_blank"><img src="images/crafto-landing-page-features-ico-10.png"
                            alt /></a>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="md-pt-0 pt-0">
        <div class="container">
            <div class="row align-items-center mb-6 sm-mb-50px text-center text-lg-start"
                data-anime='{ "el": "childs", "translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="col-xxl-7 col-xl-8 col-lg-7 md-mb-30px">
                    <h2 class="alt-font text-dark-gray fw-700 mb-0 ls-minus-2px">
                        Premium and exclusive features for free.
                    </h2>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-5">
                    <span class="fs-18 fw-600 text-dark-gray d-inline-block mb-5px">Fresh new features, even more
                        power.</span>
                    <p class="w-90 mb-0 xxl-w-100 md-w-80 md-mx-auto sm-w-100">
                        Strengthen your website's flexibility and robustness with these
                        powerful features. Access high-quality features at no cost.
                    </p>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-xl-5 row-cols-lg-4 justify-content-center mb-7"
                data-anime='{ "el": "childs", "translateX": [-30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                <div class="col icon-with-text-style-03 mb-50px md-mb-30px">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="mb-15px" src="images/crafto-landing-page-bootstrap-5-icon.jpg" alt />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font d-inline-block fw-700 text-dark-gray mb-15px fs-17">Bootstrap
                                5</span>
                            <p
                                class="fs-14 lh-24 fw-500 bg-very-light-gray pt-5px pb-5px ps-30px pe-30px xs-ps-15px xs-pe-15px border-radius-40px">
                                CSS Framework
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col icon-with-text-style-03 mb-50px md-mb-30px">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="mb-15px" src="images/crafto-landing-page-google-font-icon.jpg" alt />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font d-inline-block fw-700 text-dark-gray mb-15px fs-17">Google
                                Font</span>
                            <p
                                class="fs-14 lh-24 fw-500 bg-very-light-gray pt-5px pb-5px ps-30px pe-30px xs-ps-15px xs-pe-15px border-radius-40px">
                                Exclusive Fonts
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col icon-with-text-style-03 mb-50px md-mb-30px">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="mb-15px" src="images/crafto-landing-page-slider-revolution-icon.jpg" alt />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font d-inline-block fw-700 text-dark-gray mb-15px fs-17">
                                Slider Revolution</span>
                            <p
                                class="fs-14 lh-24 fw-500 bg-very-light-gray pt-5px pb-5px ps-30px pe-30px xs-ps-15px xs-pe-15px border-radius-40px">
                                Premium Slider
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col icon-with-text-style-03 mb-50px md-mb-30px">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="mb-15px" src="images/crafto-landing-page-tnstagram-icon.jpg" alt />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font d-inline-block fw-700 text-dark-gray mb-15px fs-17">Instagram</span>
                            <p
                                class="fs-14 lh-24 fw-500 bg-very-light-gray pt-5px pb-5px ps-30px pe-30px xs-ps-15px xs-pe-15px border-radius-40px">
                                Photo and Video
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col icon-with-text-style-03 mb-50px md-mb-30px">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="mb-15px" src="images/crafto-landing-page-mailchimp-icon.jpg" alt />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font d-inline-block fw-700 text-dark-gray mb-15px fs-17">Mailchimp</span>
                            <p
                                class="fs-14 lh-24 fw-500 bg-very-light-gray pt-5px pb-5px ps-30px pe-30px xs-ps-15px xs-pe-15px border-radius-40px">
                                Email Platform
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col icon-with-text-style-03 md-mb-30px">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="mb-15px" src="images/crafto-landing-page-w3c-validation-icon.jpg" alt />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font d-inline-block fw-700 text-dark-gray mb-15px fs-17">W3C
                                Validation</span>
                            <p
                                class="fs-14 lh-24 fw-500 bg-very-light-gray pt-5px pb-5px ps-30px pe-30px xs-ps-15px xs-pe-15px border-radius-40px">
                                Markup Validity
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col icon-with-text-style-03 md-mb-30px">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="mb-15px" src="images/crafto-landing-page-isotope-filtering-icon.jpg" alt />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font d-inline-block fw-700 text-dark-gray mb-15px fs-17">Isotope
                                Filtering</span>
                            <p
                                class="fs-14 lh-24 fw-500 bg-very-light-gray pt-5px pb-5px ps-30px pe-30px xs-ps-15px xs-pe-15px border-radius-40px">
                                Images Loaded
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col icon-with-text-style-03 md-mb-30px">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="mb-15px" src="images/crafto-landing-page-swiper-slider-icon.jpg" alt />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font d-inline-block fw-700 text-dark-gray mb-15px fs-17">Swiper
                                Slider</span>
                            <p
                                class="fs-14 lh-24 fw-500 bg-very-light-gray pt-5px pb-5px ps-30px pe-30px xs-ps-15px xs-pe-15px border-radius-40px">
                                Touch Slider
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col icon-with-text-style-03 md-mb-30px">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="mb-15px" src="images/crafto-landing-page-contact-form-icon.jpg" alt />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font d-inline-block fw-700 text-dark-gray mb-15px fs-17">Contact
                                Form</span>
                            <p
                                class="fs-14 lh-24 fw-500 bg-very-light-gray pt-5px pb-5px ps-30px pe-30px xs-ps-15px xs-pe-15px border-radius-40px">
                                Dynamic Form
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col icon-with-text-style-03 md-mb-30px">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="mb-15px" src="images/crafto-landing-page-magnific-popup-icon.jpg" alt />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font d-inline-block fw-700 text-dark-gray mb-15px fs-17">Magnific
                                Popup</span>
                            <p
                                class="fs-14 lh-24 fw-500 bg-very-light-gray pt-5px pb-5px ps-30px pe-30px xs-ps-15px xs-pe-15px border-radius-40px">
                                Lightbox & Dialog
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center align-items-center"
                    data-anime='{"translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay": 300, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div
                        class="alt-font bg-dark-red fw-700 text-white text-uppercase border-radius-30px ps-15px pe-15px fs-11 me-10px sm-m-5px d-inline-flex justify-content-center">
                        Popular
                    </div>
                    <div
                        class="alt-font fs-15 fw-700 ls-05px text-dark-gray d-inline-flex align-items-baseline text-uppercase position-relative">
                        Loaded with all the exclusive features you demand<i
                            class="feather icon-feather-arrow-right text-dark-gray fw-700 fs-15 ms-5px d-sm-inline-block d-none"></i>
                        <div
                            class="position-absolute top-minus-2px right-120px lg-right-120px z-index-minus-1 d-sm-inline-block d-none">
                            <img src="images/crafto-landing-page-stroke.png" class="w-90" alt />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="cover-background" style="background-image: url(images/crafto-landing-page-bg-img.jpg)">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-xl-9 col-lg-10 col-md-12"
                    data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <span
                        class="alt-font fs-14 lh-30 sm-fs-12 fw-600 ls-1px ps-30px pe-30px xs-ps-15px xs-pe-15px pt-5px pb-5px mb-30px text-uppercase text-white border border-color-transparent-white-very-light border-radius-100px d-inline-flex">Pay
                        once and get lifetime updates</span>
                    <h1 class="fw-500 text-white ls-minus-2px">
                        Craft a standout website with Crafto template.
                    </h1>
                    <span class="fs-20 d-inline-block mb-40px ls-minus-05px">Elevate your powerful design with Crafto,
                        the template of the
                        future.</span>
                    <a href="https://1.envato.market/R53mL2" target="_blank"
                        class="btn btn-big fw-500 btn-switch-text btn-rounded ls-0px">
                        <span>
                            <span class="btn-double-text" data-text="Purchase Crafto">Purchase Crafto</span>
                            <span><i class="fa-solid fa-circle-arrow-right"></i></span>
                        </span>
                    </a>
                    <div class="mt-9">
                        <a href="https://www.themezaa.com/" target="_blank"><img src="images/themezaa.png" alt /></a>
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}

    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/main/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/main/js/vendors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/main/js/main.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DND93RJKBT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-DND93RJKBT");
    </script>
</body>

</html>
