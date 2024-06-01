az = {
    showSwal: function (e, url, message) {
        if ("basic" == e) {
            let t = Swal.mixin({
                customClass: { confirmButton: "btn bg-gradient-info" },
            });
            t.fire({ title: "Sweet!" });
        } else if ("title-and-text" == e) {
            let a = Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger",
                },
            });
            a.fire({
                title: "Sweet!",
                text: "Modal with a custom image.",
                imageUrl: "https://unsplash.it/400/200",
                imageWidth: 400,
                imageAlt: "Custom image",
            });
        } else if ("success-message" == e) {
            Swal.fire({
                title: "¡Éxito!",
                text: message,
                icon: "success",
                // timer: 2000,
            });
        } else if ("warning-message-and-confirmation" == e) {
            let i = Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger",
                },
                buttonsStyling: !1,
            });
            i.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0,
            }).then((e) => {
                e.value
                    ? i.fire(
                          "Deleted!",
                          "Your file has been deleted.",
                          "success"
                      )
                    : e.dismiss === Swal.DismissReason.cancel &&
                      i.fire(
                          "Cancelled",
                          "Your imaginary file is safe :)",
                          "error"
                      );
            });
        } else if ("warning-message-and-cancel" == e) {
            let n = Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger",
                },
                buttonsStyling: !1,
            });
            n.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
            }).then((e) => {
                e.isConfirmed &&
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
            });
        } else if ("warning-message-delete" == e) {
            let n = Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger",
                },
                buttonsStyling: !1,
            });
            n.fire({
                title: "¿Está seguro de eliminar?",
                text: "¡No podrá recuperar los datos!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Eliminar",
                cancelButtonText: "No, retornar",
            }).then((e) => {
                e.isConfirmed &&
                    $.ajax({
                        url,
                        type: "DELETE",
                        success: function (response) {
                            Swal.fire(
                                "!Eliminado!",
                                response.message,
                                "success"
                            );
                            $("#datatable").DataTable().ajax.reload();
                        },
                        error: function (xhr, status, error) {
                            console.error("Error al eliminar el recurso:");
                        },
                    });
            });
        } else if ("custom-html" == e) {
            let l = Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger",
                },
                buttonsStyling: !1,
            });
            l.fire({
                title: "<strong>HTML <u>example</u></strong>",
                icon: "info",
                html: 'You can use <b>bold text</b>, <a href="//sweetalert2.github.io">links</a> and other HTML tags',
                showCloseButton: !0,
                showCancelButton: !0,
                focusConfirm: !1,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                confirmButtonAriaLabel: "Thumbs up, great!",
                cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                cancelButtonAriaLabel: "Thumbs down",
            });
        } else if ("rtl-language" == e) {
            let s = Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger",
                },
                buttonsStyling: !1,
            });
            s.fire({
                title: "هل تريد الاستمرار؟",
                icon: "question",
                iconHtml: "؟",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                showCancelButton: !0,
                showCloseButton: !0,
            });
        } else if ("auto-close" == e) {
            let r;
            Swal.fire({
                title: "Auto close alert!",
                html: "I will close in <b></b> milliseconds.",
                timer: 2e3,
                timerProgressBar: !0,
                didOpen() {
                    Swal.showLoading(),
                        (r = setInterval(() => {
                            let e = Swal.getHtmlContainer();
                            if (e) {
                                let t = e.querySelector("b");
                                t && (t.textContent = Swal.getTimerLeft());
                            }
                        }, 100));
                },
                willClose() {
                    clearInterval(r);
                },
            }).then((e) => {
                e.dismiss, Swal.DismissReason.timer;
            });
        } else if ("input-field" == e) {
            let o = Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger",
                },
                buttonsStyling: !1,
            });
            o.fire({
                title: "Submit your Github username",
                input: "text",
                inputAttributes: { autocapitalize: "off" },
                showCancelButton: !0,
                confirmButtonText: "Look up",
                showLoaderOnConfirm: !0,
                preConfirm: (e) =>
                    fetch(`//api.github.com/users/${e}`)
                        .then((e) => {
                            if (!e.ok) throw Error(e.statusText);
                            return e.json();
                        })
                        .catch((e) => {
                            Swal.showValidationMessage(`Request failed: ${e}`);
                        }),
                allowOutsideClick: () => !Swal.isLoading(),
            }).then((e) => {
                e.isConfirmed &&
                    Swal.fire({
                        title: `${e.value.login}'s avatar`,
                        imageUrl: e.value.avatar_url,
                    });
            });
        }
    },
};
