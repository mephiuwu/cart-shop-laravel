'use strict'

$(document).ready(function() {
    listadoJuegos();
});

const listadoJuegos = function() {
    const table = $('#table-juegos').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        },
        destroy: true,
        processing: true,
        ajax: {
            url: "/adm/juegos/getAll",
            type: 'get',
        },
        columns: [{
                data: 'price',
                name: 'price',
                searchable: true,
                "render": function(data, type, row, full) {
                    return `
                    $ ${data}
                    `;
                }
            },
            {
                data: 'nombre',
                name: 'nombre',
                searchable: true
            },
            {
                data: 'imagen',
                name: 'imagen',
                "render": function(data, type, row, full) {
                    return `
                    <a href="${data}" target="_blank"><img src="${data}" style="height:200px; width: 200px"></a>
                    `;
                }
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                "render": function(data, type, row, full) {
                    return `
                    <div class="button-list">
                        <a href="/adm/juegos/editar/` + row.id + `" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                        <a onclick="eliminar(` + row.id + `)" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                    </div>
                    `;
                }
            },
        ],
        columnDefs: [{
            targets: 0,
            width: "30%",
        }]
    });
}