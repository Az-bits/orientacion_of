import { _ACTIONS, _ESTADO } from "./actions.js";

$(document).ready(function () {
    // variables
    var form,
        modalEl,
        modalTitle,
        btnNew,
        btnCancel,
        btnSubmit,
        btnTextSubmit,
        btnState,
        table,
        id;
    form = $("#form-main");
    modalEl = $("#modal-main");
    modalTitle = $("#modal-title");
    btnNew = $("#btn-new");
    btnSubmit = $("#btn-submit");
    let selectDepartamento = $("#id_departamento"),
    selectProvincia = $("#id_provincia");
    btnTextSubmit, btnState, table, id;
    // dataTable = $("#datatable");
    btnState = {
        id: null,
        add: function () {
            modalTitle.text("nuevo municipio");
            btnSubmit.removeAttr("data-id", id);
            utilities.resetForm(form);
            btnSubmit.prop("disabled", false);
            this.id = null;
        },
        edit: function (id) {
            modalTitle.text("editar municipio");
            utilities.resetForm(form);
            this.id = id;
            btnSubmit.prop("disabled", false);
        },
    };

    table = $("#datatable").DataTable({
        order: [[0, "desc"]],
        responsive: true,
        language: {
            searchPlaceholder: "Buscar...",
        },
        lengthMenu: [
            [5, 25, 50, -1],
            [10, 25, 50, "Todos"],
        ],
        pagingType: "full_numbers",
        ajax: {
            url: "/admin/municipio",
        },
        columns: [
            { data: "id_municipio" },
            { data: "municipio" },
            { data: "provincia" },
            { data: "departamento" },
            {
                data: null,
                targets: -1,
                orderable: false,
                render: function (data, type, row) {
                    // console.log(row);
                    return _ESTADO(row.estado);
                },
            },
            {
                data: null,
                targets: -1,
                orderable: false,
                render: function (data, type, row) {
                    // console.log(row);
                    return _ACTIONS("municipio", row.id_municipio);
                },
            },
        ],
        drawCallback: function () {
            utilities.tooltip();
            utilities.loaderTool();
        },
    });
    utilities.initChoice();
    utilities.formValidateInit();
    utilities.ajaxSetup();
    // choiceInstances[1].disable();

    table.on("click", ".edit", function () {
        let id = $(this).data("id");
        btnState.edit(id);
        edit(id, table);
    });
    table.on("click", ".delete", function () {
        let id = $(this).data("id");
        az.showSwal("warning-message-delete", `/admin/municipio/${id}`);
    });
    btnNew.on("click", function (e) {
        btnState.add();
    });
    btnSubmit.on("click", function () {
        let id = btnState.id;
        btnSubmit.prop("disabled", true);
        if (!id) {
            saveRegister("/admin/municipio", "POST");
        } else {
            saveRegister(`/admin/municipio/${id}`, "PUT");
        }
    });
    selectDepartamento.change(function () {
        let idDepartamento = $(this).val();
        // console.log(idDepartamento);
        ajaxData(selectProvincia, "provincias", idDepartamento, "id_provincia", "provincia");
    });
    function edit(id, table) {
        let reg = utilities.getByID(id, table, "id_municipio");
        // console.log(reg);
        modalEl.modal("show");
        utilities.reloadStyle();
        $("form#form-main :input").each(function () {
            let name = $(this).attr("name");
            if ($(this).prop("tagName") === "SELECT") {
                // console.log(reg.municipio);
                let choice = choiceInstances.filter(
                    (elemento) => elemento._baseId === "choices--" + name
                );  
                console.log(reg[name]);
                choice[0].setChoiceByValue(`${reg[name]}`);
            } else {
                $(this).parent().addClass("is-filled");
                $(this).val(reg[name]);
            }
        });
    }
    function saveRegister(url, method) {
        // utilities.ajaxSetup();/
        $.ajax({
            type: method,
            url,
            data: form.serialize(),
            success: (d) => {
                // console.log(d);
                modalEl.modal("hide");
                $("#datatable").DataTable().ajax.reload();
                az.showSwal("success-message", null, d.message);
            },
            error: function (data) {
                btnSubmit.prop("disabled", false);
                let errors = data.responseJSON.errors;
                utilities.formValidation(errors);
            },
        });
    }
    function ajaxData(select, tabla, id, respId, respName) {
        $.ajax({
            url: `/getSelect/${tabla}/${id}`,
            method: "GET", // O 'GET' dependiendo de tu necesidad
            success: function (response) {
                choiceInstances[1].destroy();
                choiceInstances = choiceInstances.splice(0, 1)
                changeSelect(response, select, respId, respName);
                var choices = new Choices(select[0],
                    { allowHTML: true }
                  );
                  choiceInstances.push(choices);
            },
            error: function (xhr, status, error) {
                console.error("Error en la petición AJAX:", error);
            },
        });
    }
    function changeSelect(data, select, id, name) {
        select.empty();
        select.append("<option selected disabled>[SELECCIONE]</option>");
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
