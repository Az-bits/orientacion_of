import { ACTIONS } from "./actions.js";

$(document).ready(function () {
    // variables
    let form = $("#form-main"),
        dataMain,
        modalEl = $("#modal-main"),
        modalTitle = $("#modal-title"),
        btnNew = $("#btn-new"),
        btnSubmit = $("#btn-submit"),
        btnTextSubmit,
        btnState,
        table,
        id,
        dataTable;
    btnState = {
        add: function () {
            modalTitle.text("nueva persona");
            btnSubmit.removeAttr("data-id", id);
            utilities.resetForm(form);
            btnSubmit.prop("disabled", false);
        },
        edit: function (id) {
            modalTitle.text("editar persona");
            btnSubmit.attr("data-id", id);
            $(btnTextSubmit).text("ACTUALIZAR FORMULARIO");
        },
    };

    // initTable(dataTable);
    $.when(ajaxRequest()).done(function () {
        utilities.ajaxSetup();
        utilities.formValidateInit();
        utilities.initChoice();
        setupEvents();
        // // console.log((dataMain[0].nombre = "juan"));
        // // console.log(dataMain);
        // // console.log(dataTable.data[0]);
        // // this.dt.data.forEach((t, e) => {
        // //     t.dataIndex = e;
        // // });
        // // let firstRow = document.querySelector("tbody tr");
        // console.log((dataTable.data[1].cells[0].data = 2344));
        // dataTable = dataTable.data[1].cells[0].data = 2344;
        // dataTable.update();

        // // dataTable.rows;
        // // dataTable.rows.remove(parseInt(firstRow.dataset.index));
        // // console.log(dataTable.data.remove(0));
    });

    function setupEvents() {
        table.on("click", ".edit", function () {
            let id = $(this).data("id");
            btnState.edit(id);
            edit(id, dataMain);
        });
        btnNew.on("click", function (e) {
            btnState.add();
        });
        btnSubmit.on("click", function () {
            let id = $(this).data("id");
            let formData = new FormData(form[0]);
            btnSubmit.prop("disabled", true);
            if (!id) {
                saveRegister("/admin/persona", formData, "POST");
            } else {
                saveRegister(`/admin/update/${id}`, formData, "PUT");
            }
        });
    }
    function edit(id, data) {
        let reg = utilities.getByID(id, data);
        // console.log(reg);
        modalEl.modal("show");
        // utilities.reloadStyle();
        $("form#form-main :input").each(function () {
            let name = $(this).attr("name");
            if ($(this).prop("tagName") === "SELECT") {
                console.log(choiceInstances);
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
    function saveRegister(url, dataForm, method) {
        $.ajax({
            type: method,
            url,
            data: dataForm,
            cache: false,
            contentType: false,
            processData: false,
            success: (d) => {
                modalEl.modal("hide");

                dataTable.destroy();
                dataTable.init();
                // location.reload();
                // let rowData = {
                //     id: d.persona.id_persona.toString(),
                //     ci: d.persona.ci,
                //     "nombre completo": `${d.persona.nombre} ${
                //         d.persona.paterno
                //     } ${d.persona.materno == null ? "" : d.persona.materno}`,
                //     celular: d.persona.celular,
                //     accion: ACTIONS("persona"),
                // };

                // dataTable.insert(rowData);
                // // console.log(data);
                // // dataTable.destroy();
                // // dataTable.init();
                // // ajaxRequest();
                // btnSubmit.prop("disabled", false);
                // utilities.tooltip();
            },
            error: function (data) {
                btnSubmit.prop("disabled", false);
                let errors = data.responseJSON.errors;
                utilities.formValidation(errors);
            },
        });
    }
    function ajaxRequest(params) {
        let ajaxR = $.ajax({
            url: "/admin/persona",
            type: "GET",
            dataType: "json",
            success: function (data) {
                dataMain = data;

                // Inicializar la tabla con los datos recibidos
                dataTable = $("#datatable").DataTable({
                    data: {
                        headings: [
                            "id",
                            "ci",
                            "nombre completo",
                            "celular",
                            "acción",
                        ],
                        data: data.map((d, index) => [
                            // index + 1,
                            d.id_persona,
                            d.ci,
                            `${d.nombre} ${d.paterno} ${
                                d.materno ? d.materno : ""
                            }`,
                            d.celular,
                            ACTIONS("persona", d.id_persona),
                        ]),
                    },
                    searchable: true,
                    fixedHeight: false,
                    perPage: 10,
                });
                utilities.tooltip();
                table = $("#datatable");
                // utilities.styleTable();
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
        return ajaxR;
    }
});

// import { DataTable, makeEditable } from "../dist/module.js";
// let editor = false;
// let inline = true;
// let table = false;

// const resetTable = function () {
//     if (editor) {
//         editor.destroy();
//     }
//     if (table) {
//         table.destroy();
//     }
//     window.table = table = new DataTable("#demo-table", {
//         columns: [
//             {
//                 select: 3,
//                 type: "date",
//                 format: "YYYY/DD/MM",
//             },
//         ],
//     });
//     editor = makeEditable(table, {
//         contextMenu: true,
//         hiddenColumns: true,
//         excludeColumns: [1], // make the "Ext." column non-editable
//         inline,
//         menuItems: [
//             {
//                 text: "<span class='mdi mdi-lead-pencil'></span> Edit Cell",
//                 action: (editor, _event) => {
//                     const td = editor.event.target.closest("td");
//                     return editor.editCell(td);
//                 },
//             },
//             {
//                 text: "<span class='mdi mdi-lead-pencil'></span> Edit Row",
//                 action: (editor, _event) => {
//                     const tr = editor.event.target.closest("tr");
//                     return editor.editRow(tr);
//                 },
//             },
//             {
//                 separator: true,
//             },
//             {
//                 text: "<span class='mdi mdi-delete'></span> Remove",
//                 action: (editor, _event) => {
//                     if (confirm("Are you sure?")) {
//                         const tr = editor.event.target.closest("tr");
//                         editor.removeRow(tr);
//                     }
//                 },
//             },
//         ],
//     });
// };
// resetTable();
// document.getElementById("modal").addEventListener("input", (_event) => {
//     inline = !inline;
//     resetTable();
// });
