@section('title')
    Editar juego
@endsection
@extends('admin.layouts.main')
@section('rightbar-content')
    <div class="contentbar">
        <form action="{{route('juegos.processEdit')}}" id="formularioJuego" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$juego->id}}">
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
                                        value="{{ $juego->nombre }}" placeholder="Nombre" required>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label for="url" class="col-sm-12 col-form-label">Url (ej:
                                    https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=806&lang=es)</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control font-15" id="url" name="url"
                                        value="{{ $juego->url }}" placeholder="Url del juego" required>
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Consola</label>
                                <div class="col-sm-12">
                                    <select class="select2-single form-control" name="console">
                                        <option value="{{$juego->consola->id}}" selected hidden>{{$juego->consola->nombre}}</option>
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
                                        placeholder="Descripción del juego" required>{{ $juego->descripcion }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="estado" class="col-sm-12 col-form-label">Estado</label>
                                <div class="col-sm-12">
                                    <select name="estado" id="estado" class="form-control font-15" required>
                                        @if ($juego->estado == 1)
                                            <option value="1" selected>Activo</option>
                                            <option value="0">Inactivo</option>
                                        @else
                                            <option value="0" selected>Inactivo</option>
                                            <option value="1">Activo</option>
                                        @endif
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
                            <div class="form-group row">
                                <label for="imagen" class="col-sm-12 col-form-label" style="margin-top: -20px">imagen actual</label>
                                <img src="{{$juego->imagen}}" style="height:150px; width: 150px;margin-left: 15px">
                            </div>
                            <br>
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
                                    <input type="text" name="imagen" id="imagen" class="form-control font-15" value="{{$juego->imagen}}" placeholder="Url">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="quantity" class="col-sm-12 col-form-label">Cantidad</label>
                                <div class="col-sm-12">
                                    <input type="number" name="quantity" id="quantity" class="form-control font-15" placeholder="0" value="{{$juego->quantity}}" min="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-12 col-form-label">Precio</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="price" name="price" placeholder="$ 0" value="{{$juego->price}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-xl-6">
                <a href="{{ route('juegos.index') }}" class="btn btn-primary-rgba">Volver</a>
            </div>
            <div class="col-xl-6">
                <button class="btn btn-primary-rgba" onclick="enviarFormulario()">Editar</button>
            </div>
        </div>
        <br>
    </div>
@endsection
@section('script')
    <script>
        function radioImagen(tipo){
            if(tipo == 2){
                $('#tipoImagen').html(`
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="imagen" class="col-sm-12 col-form-label">Imagen / Url</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control font-15" name="imagen" accept="image/*" value="{{$juego->imagen}}" required>
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
                                <input type="text" name="imagen" id="imagen" class="form-control font-15" value="{{$juego->imagen}}" placeholder="Url">
                            </div>
                        </div>
                    </div>
                `);
            }
        }
    </script>
    <script src="{{ asset('admin/js/games/editar.js') }}"></script>
@endsection
