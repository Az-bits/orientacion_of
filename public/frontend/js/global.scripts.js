$(document).ready(function () {
    // alert();
    let btnNext = $(".btn-next");
    let btnOpen = $(".open");
    let modalCI = $("#modal-ci");
    let modalTitle = $("#modal-title");

    btnOpen.click(function () {
        modalCI.modal("show");
        modalTitle.text($(this).find(".btn-double-text").text());
    });

    btnNext.click(function () {
        let ci = $("#ci").val();
        $.ajax({
            url: `/buscarEstudiante/${ci}`,
            method: "GET",
            success: function (r) {
                r == 0
                    ? (window.location.href = "/registrarse")
                    : // : (window.location.href = `/perfil/${ci}`);
                      (window.location.href = `/test/sovi3`);
            },
            error: function (xhr, status, error) {
                console.error("Error en la petición AJAX:", error);
            },
        });
    });
});
$(window).on("load", function () {
    $(".loader-container").fadeOut("slow");
    $(".content").fadeIn("slow");
});
/**
 * Begin::Registrarse Js
 */
$(document).ready(function () {
    particlesJS({
        particles: {
            number: {
                value: 43,
                density: {
                    enable: true,
                    value_area: 800,
                },
            },
            color: {
                value: "#ffffff",
            },
            shape: {
                type: "circle",
                stroke: {
                    width: 0,
                    color: "#000000",
                },
                polygon: {
                    nb_sides: 5,
                },
                image: {
                    src: "img/github.svg",
                    width: 100,
                    height: 100,
                },
            },
            opacity: {
                value: 0.5,
                random: false,
                anim: {
                    enable: false,
                    speed: 1,
                    opacity_min: 0.1,
                    sync: false,
                },
            },
            size: {
                value: 3,
                random: true,
                anim: {
                    enable: false,
                    speed: 40,
                    size_min: 0.1,
                    sync: false,
                },
            },
            line_linked: {
                enable: true,
                distance: 150,
                color: "#ffffff",
                opacity: 0.4,
                width: 1,
            },
            move: {
                enable: true,
                speed: 6,
                direction: "none",
                random: false,
                straight: false,
                out_mode: "out",
                bounce: false,
                attract: {
                    enable: false,
                    rotateX: 600,
                    rotateY: 1200,
                },
            },
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: true,
                    mode: "repulse",
                },
                onclick: {
                    enable: true,
                    mode: "push",
                },
                resize: true,
            },
            modes: {
                grab: {
                    distance: 400,
                    line_linked: {
                        opacity: 1,
                    },
                },
                bubble: {
                    distance: 400,
                    size: 40,
                    duration: 2,
                    opacity: 8,
                    speed: 3,
                },
                repulse: {
                    distance: 200,
                    duration: 0.4,
                },
                push: {
                    particles_nb: 4,
                },
                remove: {
                    particles_nb: 2,
                },
            },
        },
        retina_detect: true,
    });
    // $('#ci').val('12345');
    // $('#nombres').val('Edwin');
    // $('#apellidos').val('Alanoca Ramirez');
    // $('#celular').val('12345678');
    // $('#edad').val('24');
    // $('#genero').val('M');
    let status = false;
    let selectDepartamento = $("#departamento");
    let selectProvincia = $("#provincia");
    let selectMunicipio = $("#municipio");
    let selectColegio = $("#colegio");
    // Configuración de las reglas de validación una vez al cargar la página
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    selectDepartamento.change(function () {
        let idDepartamento = $(this).val();
        ajaxData(
            selectProvincia,
            "provincias",
            idDepartamento,
            "id_provincia",
            "provincia"
        );
    });
    selectProvincia.change(function () {
        let idMunicipio = $(this).val();
        ajaxData(
            selectMunicipio,
            "municipios",
            idMunicipio,
            "id_municipio",
            "municipio"
        );
    });
    selectMunicipio.change(function () {
        let idColegio = $(this).val();
        ajaxData(selectColegio, "colegios", idColegio, "id_colegio", "colegio");
    });
    $("#form-main").validate({
        rules: {
            ci: {
                required: true,
            },
            // nombreCompleto: "required",
            // edad: {
            //     required: true,
            //     digits: true, // Permite solo números
            //     maxlength: 2,
            // },
            // celular: {
            //     required: true,
            //     digits: true, // Permite solo números
            //     minlength: 8,
            //     maxlength: 8,
            // },
            // genero: "required",
            departamento: "required",

            // ci: "required",
            // ci: "required",
            // Aquí puedes agregar más reglas de validación según sea necesario
        },
        messages: {
            ci: {
                required: "Campo requerido",
                // regex: "Por favor, introduce solo caracteres alfabéticos"
            },
            nombreCompleto: "Campo requerido",
            edad: {
                required: "Campo requerido",
                digits: "Por favor, introduce solo números",
                maxlength: "El edad debe tener maximo 2 dígitos",
            },
            celular: {
                required: "Campo requerido",
                digits: "Por favor, introduce solo números",
                minlength: "El celular debe tener exactamente 8 dígitos",
                maxlength: "El celular debe tener exactamente 8 dígitos",
            },
            genero: "Campo requerido",
            departamento: "Campo requerido",
            // Aquí puedes agregar mensajes de error personalizados para cada regla de validación
        },
    });
    // Evento de clic en #to-datos-colegio para activar la validación del formulario
    $("#to-datos-colegio").click(function () {
        if ($("#form-main").valid()) {
            $("#datos-colegio-tab").tab("show");
            $("#datos-colegio-tab").addClass("active");
            $("#datos-personales-tab").removeClass("active");
        }
    });
    $("#btn-submit").click(function () {
        if ($("#form-main").valid()) {
            $.ajax({
                url: `/registrarse`,
                method: "POST",
                data: $("#form-main").serialize(),
                success: function (r) {
                    Swal.fire({
                        title: "¡Éxito!",
                        text: r.message,
                        icon: "success",
                    });
                    setTimeout(() => {
                        window.location.href = `test/sovi3`;
                    }, 1000);
                },
                error: function (xhr, status, error) {
                    let data = xhr.responseJSON.errors;
                    let e = "";
                    $.each(data, function (key, value) {
                        console.log(value);
                        e +=
                            "<li class='text-warning text-sm'>" +
                            value +
                            "</li>";
                    });
                    let errors = `<ul>${e}</ul>`;

                    Swal.fire({
                        icon: "error",
                        title: "¡Error!",
                        html: errors,
                    });
                },
            });
        }
    });

    function ajaxData(select, tabla, id, respId, respName) {
        $.ajax({
            url: `/getSelect/${tabla}/${id}`,
            method: "GET", // O 'GET' dependiendo de tu necesidad
            success: function (response) {
                // console.log('Respuesta del servidor:', response);
                select.prop("disabled", false);
                changeSelect(response, select, respId, respName);
            },
            error: function (xhr, status, error) {
                console.error("Error en la petición AJAX:", error);
            },
        });
    }

    function changeSelect(data, select, id, name) {
        select.empty();
        select.append("<option selected disabled hidden>[SELECCIONE]</option>");
        if (!data || data.length === 0) {
            select.append(`<option disabled>No hay ${name}s</option>`);
        }
        $.each(data, function (key, value) {
            select.append(
                '<option value="' + value[id] + '">' + value[name] + "</option>"
            );
        });
    }
});

/**
 * End::Registrarse Js
 */
