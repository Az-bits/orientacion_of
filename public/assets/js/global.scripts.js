var utilities;
var choiceInstances = [];
var loader = $(".az-spinner");
var table = $(".table-responsive");
// $(document).ready(function () {
utilities = {
    tooltip: function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    },
    styleTable: function () {
        const rows = document.querySelectorAll("#datatable tbody tr");
        rows.forEach((row) => {
            row.classList.add("text-sm"); // Agrega clases de estilo a cada fila
        });
    },
    formValidateInit: function () {
        $("form#form-main :input").change(function () {
            var e = this; // "this" hace referencia al elemento de entrada que ha cambiado
            e.parentElement.classList.remove("is-invalid", "mb-3");
            var smallElement = e.parentElement.querySelector("small");
            if ($(this).prop("tagName") === "SELECT")
                $(`#select-validation-${$(e).attr("name")}`).removeClass(
                    "is-invalid mb-3"
                );
            if (smallElement) {
                smallElement.innerText = "";
            }
        });
    },
    reloadStyle: function () {
        $("form#form-main :input").change(function () {
            var e = this; // "this" hace referencia al elemento de entrada que ha cambiado
            var smallElement = e.parentElement.querySelector("small");
            if (e.parentElement) {
                $(e.parentElement).addClass("is-filled");
            }
            if ($(this).prop("tagName") === "SELECT")
                $(`#select-validation-${$(e).attr("name")}`).removeClass(
                    "is-invalid mb-3"
                );
            if (smallElement) {
                smallElement.innerText = "";
            }
        });
    },
    formValidation: function (errors) {
        $("form#form-main :input").each(function () {
            let name = $(this).attr("name");
            let value = $(this).val();
            if ($(this).prop("tagName") === "SELECT") {
                if (errors.hasOwnProperty(name)) {
                    showError($(`[error-name="${name}"`)[0], errors[name]);
                }
            } else if ($(this).is(":radio")) {
                console.log("radio");
            } else {
                if (errors.hasOwnProperty(name)) {
                    // console.log(errors[name]);
                    errors[name].length > 1
                        ? showError($(`[name="${name}"`)[0], errors[name][0])
                        : showError($(`[name="${name}"`)[0], errors[name]);
                } else if (value.trim() !== "") {
                    showSucces($(`[name="${name}"`)[0]);
                }
            }
        });
    },
    initChoice: function (search = false) {
        if (document.querySelectorAll(".choices")) {
            var elements = document.querySelectorAll(".choices");
            elements.forEach(function (element) {
                var instance = new Choices(element, {
                    searchEnabled: search,
                });
                instance.setChoiceByValue("");
                choiceInstances.push(instance);
            });
        }
    },
    resetChoice: function () {
        choiceInstances.forEach(function (choice) {
            choice.setChoiceByValue("");
        });
    },
    resetForm: function (form) {
        // form.trigger("reset");
        $("form#form-main :input").each(function () {
            let e = $(this);
            if (e.prop("tagName") == "SELECT") {
                e.val("").trigger("change");
                utilities.resetChoice();
            } else if (e.prop("type") === "checkbox") {
                e.prop("checked", false);
            } else {
                e.parent().removeClass("is-invalid is-valid is-filled mb-3");
                e.val("");
                if (e.prop("type") === "date") {
                    e.parent().addClass("is-filled");
                }
            }
        });
    },
    ajaxSetup: function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
    },
    getByID: function (id, table, id_row) {
        return table
            .rows()
            .data()
            .filter(function (row) {
                return row[id_row] === parseInt(id);
            })[0];
    },
    loaderTool: function () {
        table.addClass("mostrar");
        loader.addClass("oculto");
        loader.hide();
    },
};
window.languageTable = {
    search: "_INPUT_",
    searchPlaceholder: "Buscar...",
    decimal: "",
    emptyTable: "No hay información",
    info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
    infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
    infoFiltered: "(Filtrado de _MAX_ total entradas)",
    infoPostFix: "",
    thousands: ",",
    lengthMenu: "Mostrar _MENU_ Entradas",
    loadingRecords: "Cargando...",
    processing: "Procesando...",
    zeroRecords: "Sin resultados encontrados",
};
