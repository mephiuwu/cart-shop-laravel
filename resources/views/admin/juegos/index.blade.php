@section('title')
    Juegos
@endsection

@extends('admin.layouts.main')

@section('style')
    <!-- CSS -->
    <link href="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('rightbar-content')
    <div class="contentbar" style="margin-bottom: -15px; margin-top: -15px">
        <a href="{{ route('juegos.crear') }}" class="btn btn-primary-rgba float-right"><i
                class="feather icon-plus mr-2"></i>Agregar</a>
    </div>
    <div class="contentbar">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Juegos</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle">Lista de todos los juegos.</h6>
                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="table-juegos">
                                <thead>
                                    <tr>
                                        <th>Precio</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Precio</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Scripts -->
    <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/custom-table-datatable.js') }}"></script>
    <script src="{{ asset('admin/js/games/index.js') }}"></script>

    <script>
        function eliminar(id_juego, e) {
            Swal.fire({
                title: '¿Estas seguro que quieres eliminar este juego?',
                text: "Esta acción no se puede deshacer!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#1E3A8A',
                cancelButtonColor: '#9CA3AF',
                confirmButtonText: 'Si, estoy seguro'
            }).then((result) => {
                if (result.isConfirmed) {
                    let id = id_juego;
                    $.ajax({
                        type: "post",
                        url: "/adm/juegos/eliminar",
                        data: {
                            _token: "{{ csrf_token() }}",
                            "id": id,
                        },
                        success: function(response) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            });
                            if (response.status == 200) {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Juego eliminado satisfactoriamente!'
                                });
                                listadoJuegos();
                            } else if (response.status == 500) {
                                Toast.fire({
                                    icon: 'error',
                                    title: response.message
                                });
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Ha ocurrido un error interno. Intentelo de nuevo mas tarde.'
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
