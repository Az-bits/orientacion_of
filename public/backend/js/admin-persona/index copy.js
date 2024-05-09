$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});

// function add() {
//     $("#EmployeeForm").trigger("reset");
//     $("#EmployeeModal").html("Add Employee");
//     $("#employee-modal").modal("show");
//     $("#id").val("");
// }

// function editFunc(id) {
//     $.ajax({
//         type: "POST",
//         url: "{{ url('edit') }}",
//         data: {
//             id: id,
//         },
//         dataType: "json",
//         success: function (res) {
//             $("#EmployeeModal").html("Edit Employee");
//             $("#employee-modal").modal("show");
//             $("#id").val(res.id);
//             $("#name").val(res.name);
//             $("#address").val(res.address);
//             $("#email").val(res.email);
//         },
//     });
// }

// function deleteFunc(id) {
//     if (confirm("Delete Record?") == true) {
//         var id = id;
//         // ajax
//         $.ajax({
//             type: "POST",
//             url: "{{ url('delete') }}",
//             data: {
//                 id: id,
//             },
//             dataType: "json",
//             success: function (res) {
//                 var oTable = $("#ajax-crud-datatable").dataTable();
//                 oTable.fnDraw(false);
//             },
//         });
//     }
// }

// Realizar la solicitud AJAX para obtener los datos

import { ACTIONS } from "./actions.js";
$(document).ready(function () {
    $("#modal-main").modal("show");
    $.ajax({
        url: "/admin/persona",
        type: "GET",
        dataType: "json",
        success: function (data) {
            // Inicializar la tabla con los datos recibidos
            const dataTableSearch = new simpleDatatables.DataTable(
                "#datatable",
                {
                    data: {
                        headings: [
                            "id",
                            "ci",
                            "nombre completo",
                            "celular",
                            "acción",
                        ],
                        data: data.map((d, index) => [
                            d.id_persona,
                            // index + 1,
                            // { content: d.ci, class: "text-sm" },
                            d.ci,
                            d.nombre + " " + d.paterno + " " + d.materno,
                            d.celular,
                            ACTIONS("persona"),
                        ]),
                    },
                    searchable: true,
                    fixedHeight: false,
                    perPage: 10,
                }
            );
            dataTableSearch.on("datatable.init", function () {
                const rows = dataTableSearch.table.tBodies[0].rows;
                for (let i = 0; i < rows.length; i++) {
                    rows[i].classList.add("text-sm"); // Agregar la clase 'text-sm' a cada fila
                }
            });
            utilities.tooltip();
            // utilities.styleTable();
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
    $("#btn-submit").on("click", function () {
        console.log("click");
        var formData = new FormData($("#form-main")[0]);
        // console.log(formData);
        // return;
        $.ajax({
            type: "POST",
            url: "/admin/persona",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal-main").modal("hide");
                // material.showSwal("basic");
                // $("#employee-modal").modal("hide");
                // var oTable = $("#ajax-crud-datatable").dataTable();
                // oTable.fnDraw(false);
                // $("#btn-save").html("Submit");
                // $("#btn-save").attr("disabled", false);
            },
            error: function (data) {
                let errors = JSON.parse(data.responseText);
                return;
                // let errors;
                console.log(errors);
                // console.log(data.responseJSON);
                // console.log(data);
                var nombre = $("#nombre");
                for (let key in errors) {
                    // if (errors.hasOwnProperty(clave)) {
                    console.log("Clave:", key, ", Valor:", errors[key]);
                    // }
                    showError($(`#${key}`)[0],errors[key]);
                }
                // showError(
                //     $("#paterno")[0],
                //     JSON.parse(data.responseText).errors.paterno
                // );
                // $("#error-expedido").innerText = JSON.parse(
                //     data.responseText
                // ).errors.paterno;
                // showError(
                //     $("#expedido")[0],
                //     JSON.parse(data.responseText).errors.paterno
                // );
                // showErrorSelect(
                //     $("#expedido")[0],
                //     JSON.parse(data.responseText).errors.paterno
                // );

                // nombre.
                // console.log(data.responseText);
                // let l = Swal.mixin({
                //     customClass: {
                //         confirmButton: "btn bg-gradient-success",
                //         cancelButton: "btn bg-gradient-danger",
                //     },
                //     buttonsStyling: !1,
                // });
                // l.fire({
                //     title: "<strong>HTML <u>example</u></strong>",
                //     icon: "info",
                //     html: JSON.parse(data.responseText).errors.paterno,
                //     showCloseButton: !0,
                //     showCancelButton: !0,
                //     focusConfirm: !1,
                //     confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                //     confirmButtonAriaLabel: "Thumbs up, great!",
                //     cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                //     cancelButtonAriaLabel: "Thumbs down",
                // });
                // $("#modal-main").modal("hide");
                // az.showSwal("custom-html");

                // Swal.mixin({
                //     customClass: { confirmButton: "btn bg-gradient-info" },
                // });
            },
        });
    });

    // $("#form-main").on(function (e) {
    //     e.preventDefault();
    //     console.log("sub");
    //     // var formData = new FormData(this);
    //     // $.ajax({
    //     //     type: "POST",
    //     //     url: "{{ url('store') }}",
    //     //     data: formData,
    //     //     cache: false,
    //     //     contentType: false,
    //     //     processData: false,
    //     //     success: (data) => {
    //     //         $("#employee-modal").modal("hide");
    //     //         var oTable = $("#ajax-crud-datatable").dataTable();
    //     //         oTable.fnDraw(false);
    //     //         $("#btn-save").html("Submit");
    //     //         $("#btn-save").attr("disabled", false);
    //     //     },
    //     //     error: function (data) {
    //     //         console.log(data);
    //     //     },
    //     // });
    // });
    // $("#nombre").change(function () {
    //     ((e = e.parentElement).className =
    //         "input-group input-group-outline is-valid is-filled"),
    //         (e.querySelector("small").innerText = "");
    //     // showSucces($("#nombre")[0]);
    // });
});
// function showErrorSelect(e, t) {
    // e.querySelector("#error-expedido").innerText = t;
// }
// function showError(e, t) {
//     ((e = e.parentElement).className =
//         "input-group input-group-outline my-5 is-invalid is-filled"),
//         (e.querySelector("small").innerText = t);
// }
