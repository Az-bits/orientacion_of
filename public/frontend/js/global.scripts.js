$(document).ready(function () {
    // alert();
    let btnNext = $(".cedula");
    let historial = $(".historial");
    let btnOpen = $(".open");
    let btnHistorial = $("#historial");
    let modalCI = $("#modal-ci");
    let modalHist = $("#modal-historial");
    let modalTitle = $("#modal-title");

    btnOpen.click(function () {
        modalCI.modal("show");
        modalTitle.text($(this).find(".btn-double-text").text());
    });
    btnHistorial.click(function () {
        modalHist.modal("show");
        modalTitle.text("historial");
    });
    historial.click(function () {
        let ci2 = $("#ci2").val();
        $.ajax({
            url: `/buscarEstudiante/${ci2}`,
            method: "GET",
            success: function (r) {
                // ? (window.location.href = "/registrarse")
                // : // : (window.location.href = `/perfil/${ci}`);
                //   (window.location.href = `/test/sovi3`);

                if (r == 0) {
                    Swal.fire({
                        title: "!Usted no se encuentra registrado!",
                        text: "¿Quiere hacerlo?",
                        icon: "success",
                        html: '<a class="btn btn-next" href="/registrarse">Registrarse</a>',
                        showCancelButton: true,
                        showConfirmButton: false,
                        cancelButtonText: "No gracias",
                    });
                } else {
                    window.location.href = `/historial`;
                }
            },
            error: function (xhr, status, error) {
                console.error("Error en la petición AJAX:", error);
            },
        });
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
