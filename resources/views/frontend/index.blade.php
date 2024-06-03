@extends('frontend.app')
@section('content')
    <style>
        canvas {
            bottom: 0rem;
            position: absolute;
        }
    </style>
    <section id="particles-js" class="banner-content full-screen ipad-top-space-margin md-h-850px"
        data-parallax-background-ratio="0.8">
        <div class="container h-100 position-relative">
            <div class="row align-items-start justify-content-center h-100 text-center">
                <div class="col-xl-10 col-lg-12 position-relative z-index-2">
                    <div>
                        <h2 class="maquina fw-500 ls-minus-1px mb-20px text-white w-80 xl-w-90 md-w-100 mx-auto mt-2">
                            <span class="linea">
                                <span>Test de</span><br class="az-span" />
                                <span>Orientación</span><br />
                                <span>Vocacional</span><br class="az-span" />
                                {{-- <span>CHASIDES</span><br /> --}}
                            </span>
                        </h2>
                    </div>
                    <div class="fs-21 lh-32 lg-w-90 mx-auto az-text-banner w-65">
                        El Cuestionario de Intereses Profesionales (CIP-R) contiene 114 preguntas acerca de las Carreras que
                        debes responder según tu agrado, desagrado o indiferencia.
                    </div>
                    <div class="mt-35px position-relative z-index-9">
                        <a href="javascript:void(0)"
                            class="btn btn-white fw-700 btn-extra-large btn-rounded btn-switch-text ls-0px  btn-box-shadow mb-0 xs-mb-20px me-15px open">
                            <span>
                                <span class="btn-double-text"
                                    data-text="Cuestionario de Intereses Profesionales">Cuestionario de Intereses
                                    Profesionales</span>
                            </span>
                        </a>
                        <a href="javascript:void(0)"
                            class="btn btn-white fw-700 btn-extra-large btn-rounded btn-switch-text ls-0px  btn-box-shadow mb-0 xs-mb-20px me-15px open">
                            <span>
                                <span class="btn-double-text" data-text="Test Chaside">Test Chaside</span>
                            </span>
                        </a>
                        <a href="javascript:void(0)"
                            class="btn btn-white fw-700 btn-extra-large btn-rounded btn-switch-text ls-0px  btn-box-shadow mb-0 xs-mb-20px me-15px open">
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
        <img width="300px" height="300px" src="{{ asset('assets/main/images/upeaLogo.png') }}"
            class="position-absolute top-45 left-100px lg-left-0px z-index-1 animation-float d-lg-block d-none" alt
            data-bottom-top="transform: translateY(-50px)" data-top-bottom="transform: translateY(50px)"
            style="bottom: 9rem;" />
        <img width="300px" height="300px" src="{{ asset('assets/main/images/logo-edu.jpg') }}"
            class="position-absolute top-45 left-100px lg-left-0px z-index-1 animation-float d-lg-block d-none" alt
            data-bottom-top="transform: translateY(-50px)" data-top-bottom="transform: translateY(50px)"
            style="bottom: 9rem; left: 89rem;" />
        <div class="position-absolute bottom-0 h-100 left-0px w-100 full-screen z-index-minus-1 cover-background bg-dark-gray"
            style="
          background-image: url('');
        ">
        </div>
    </section>

    <div class="loader-container">
        <div class="loader">
            <span>Cargando...</span>
        </div>
    </div>
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
    </section> --}}
    <!-- Button trigger modal -->
    @php
        $title = 'TEST SOVI 3';
    @endphp
    <!-- Modal -->
    <div class="modal fade az-modal" id="modal-ci" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="modal-title">{{ $title }}</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <p class="m-0 text-warning">Ingrese su cedula de identidad para poder realizar el test:</p>

                <div class="modal-body p-0">
                    <div class="row" id="date-student">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ci">Cedula de Identidad</label>
                                <input name="ci" id="ci" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-transparent btn-cancelar"
                        data-bs-dismiss="modal">cancelar</button>
                    <button type="button" class="btn btn-next ">Ingresar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
