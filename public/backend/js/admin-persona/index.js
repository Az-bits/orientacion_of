import { ACTIONS } from "./actions.js";

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
    btnTextSubmit, btnState, table, id;
    // dataTable = $("#datatable");
    btnState = {
        id: null,
        add: function () {
            modalTitle.text("nueva persona");
            btnSubmit.removeAttr("data-id", id);
            utilities.resetForm(form);
            btnSubmit.prop("disabled", false);
            this.id = null;
        },
        edit: function (id) {
            modalTitle.text("editar persona");
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
            url: "/admin/persona",
        },
        columns: [
            { data: "id_persona" },
            { data: "ci" },
            { data: "nombre_completo" },
            { data: "celular" },
            // { data: "celular" },
            {
                data: null,
                targets: -1,
                orderable: false,
                render: function (data, type, row) {
                    // console.log(row);
                    return ACTIONS("persona", row.id_persona);
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

    table.on("click", ".edit", function () {
        let id = $(this).data("id");
        btnState.edit(id);
        edit(id, table);
    });
    table.on("click", ".delete", function () {
        let id = $(this).data("id");
        az.showSwal("warning-message-delete", `/admin/persona/${id}`);
    });
    btnNew.on("click", function (e) {
        btnState.add();
    });
    btnSubmit.on("click", function () {
        let id = btnState.id;
        btnSubmit.prop("disabled", true);
        if (!id) {
            saveRegister("/admin/persona", "POST");
        } else {
            saveRegister(`/admin/persona/${id}`, "PUT");
        }
    });
    function edit(id, table) {
        let reg = utilities.getByID(id, table, "id_persona");
        modalEl.modal("show");
        utilities.reloadStyle();
        $("form#form-main :input").each(function () {
            let name = $(this).attr("name");
            if ($(this).prop("tagName") === "SELECT") {
                let choice = choiceInstances.filter(
                    (elemento) => elemento._baseId === "choices--" + name
                );
                choice[0].setChoiceByValue(reg[name]);
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
                modalEl.modal("hide");
                $("#datatable").DataTable().ajax.reload();
            },
            error: function (data) {
                btnSubmit.prop("disabled", false);
                let errors = data.responseJSON.errors;
                utilities.formValidation(errors);
            },
        });
    }
});
