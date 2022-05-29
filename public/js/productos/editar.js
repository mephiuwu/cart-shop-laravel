'use strict'

function radioImagen(tipo){
    if(tipo == 2){
        $('#tipoImagen').html(`
            <div class="card-body">
                <div class="form-group row">
                    <label for="imagen" class="col-sm-12 col-form-label">Imagen / Url</label>
                    <div class="col-sm-12">
                        <input type="file" class="form-control font-15" name="imagen" accept="image/*" required>
                    </div>
                </div>
            </div>
        `);
    }else{
        $('#tipoImagen').html(`
            <div class="card-body">
                <div class="form-group row">
                    <label for="imagen" class="col-sm-12 col-form-label">Url imagen</label>
                    <div class="col-sm-12">
                        <input type="text" name="imagen" id="imagen" class="form-control font-15" placeholder="Url">
                    </div>
                </div>
            </div>
        `);
    }
}

function enviarFormulario() {
    var formData = new FormData(document.getElementById("formularioJuego"));
    $.ajax({
        url: "/juegos/process_editar",
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