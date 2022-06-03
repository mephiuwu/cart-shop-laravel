'use strict'

function enviarFormulario() {
    var formData = new FormData(document.getElementById("formularioJuego"));
    $.ajax({
        url: "/juegos/processEdit",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data.status == 500) {
                Swal.fire({
                    title: '¡Error!',
                    text: data.message,
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            } else {
                Swal.fire({
                    title: '¡Ok!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                })
                setTimeout(() => {
                    window.location.href = "/juegos/";
                }, 1000);
            }
        },
    })
}