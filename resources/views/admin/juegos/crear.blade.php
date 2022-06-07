@section('title')
    Agregar juego
@endsection
@extends('admin.layouts.main')

@section('style')
<!-- Select2 css -->
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection 

@section('rightbar-content')
    <div class="contentbar">
        <form action="{{route('juegos.processCreate')}}" id="formularioJuego" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-xl-7">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Juego</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-12 col-form-label">Nombre</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control font-15" name="nombre" id="nombre"
                                        placeholder="Nombre">
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label for="url" class="col-sm-12 col-form-label">Url (ej:
                                    https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=806&lang=es)</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control font-15" id="url" name="url"
                                        placeholder="Url del juego">
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Consola</label>
                                <div class="col-sm-12">
                                    <select class="select2-single form-control" name="console">
                                        <option value="" selected disabled>Seleccione la consola</option>
                                        @foreach ($consoles as $console)
                                            <option value="{{$console->id}}">{{$console->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Descripción</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
                                        placeholder="Descripción del juego"></textarea>
                                </div>
                            </div>
                            <div class="form-group row pb-2">
                                <label for="estado" class="col-sm-12 col-form-label">Estado</label>
                                <div class="col-sm-12">
                                    <select name="estado" id="estado" class="form-control font-15">
                                        <option selected disabled>Seleccione estado</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Url / Imagen</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle">Porfavor marque Url imagen si adjuntará la url de una imagen, sí desea adjuntar la imagen como archivo marque la segunda opción.</h6>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="radio_imagen" onchange="radioImagen(this.value)" id="url_imagen" value="1" checked>
                              <label class="form-check-label" for="url_imagen">
                                Url imagen
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="radio_imagen" onchange="radioImagen(this.value)" id="file_imagen" value="2">
                              <label class="form-check-label" for="file_imagen">
                                Archivo imagen
                              </label>
                            </div>
                        </div>
                    </div>
                    <div class="card m-b-30" id="tipoImagen">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="imagen" class="col-sm-12 col-form-label">Url imagen</label>
                                <div class="col-sm-12">
                                    <input type="text" name="imagen" id="imagen" class="form-control font-15" placeholder="Url">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="quantity" class="col-sm-12 col-form-label">Cantidad</label>
                                <div class="col-sm-12">
                                    <input type="number" name="quantity" id="quantity" class="form-control font-15" placeholder="0" min="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-12 col-form-label">Precio</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="price" name="price" placeholder="$ 0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-xl-6">
                <a href="{{route('juegos.index')}}" class="btn btn-primary-rgba">Volver</a>
            </div>
            <div class="col-xl-6">
                <button class="btn btn-primary-rgba" onclick="enviarFormulario()">Agregar</button>
            </div>
        </div>
        <br>
    </div>
@endsection
@section('script')
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin/js/games/crear.js') }}"></script>
@endsection
