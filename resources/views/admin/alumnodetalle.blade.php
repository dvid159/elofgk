@extends('layout.admin')

@section('js')
{{-- <script src="{{ asset('js/alumno.js') }}"></script> --}}
<script src="{{ asset('js/alumnoUpdate.js') }}"></script>
@endsection

@include ('footer')

@section('contenido')
<div class="container">

    <!--encabezado-->
    <form id="editform" class="col s12" autocomplete="off" enctype="multipart/form-data">
            <header >
                <h5>{{ $alumno }}</h5>
                <input id="carnet_alumno" name="carnet_alumno" type="hidden" value="{{  $alumno }}">
            </header>



            @csrf
            <div class="card-panel" style="border-radius: 7px;">

                <div class="row">
                    <div class="card-image col s12 m3">
                        <img class="responsive-img" src="../img/user_round.png" style=" border-style: groove;">
                    </div>

                    <div class="col s12 m9">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="nombres" name="nombres" type="text" class="validate">
                                <label class="active" for="nombres">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="apellidos" name="apellidos" type="text" class="validate">
                                <label for="apellidos">Apellidos</label>
                            </div>

                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">date_range</i>
                                <input id="fecha" name="fecha" type="text" class="datepicker">
                                <label for="fecha">Fecha de Nacimiento</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <p>
                                    <label>Sexo</label>
                                    <label>
                                        <input name="sexo" id="sexo" value="F" type="radio" />
                                        <span>F</span>
                                    </label>
                                    <label>
                                        <input name="sexo" id="sexo" value="M" type="radio" />
                                        <span>M</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="file-field input-field col s12 m6">
                        <div class="btn waves-light blue-grey lighten-2">
                            <span>Foto</span>
                            <input type="file" name="foto">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">home</i>
                        <input id="direccion" name="direccion" type="text" class="validate">
                        <label for="direccion">Direccion</label>
                    </div>

                    <div class="input-field col s12 m4">
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" name="id_municipio" id="autocompleteMunicipio" class="autocomplete">
                        <label>Municipio</label>
                        <input type="hidden" id="idm" name="idm">
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s12 m3">
                        <i class="material-icons prefix">email</i>
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>

                    <div class="input-field col s12 m3">
                        <i class="material-icons prefix">local_phone</i>
                        <input id="tel" name="tel" type="text" class="validate">
                        <label for="tel">Numero de Telefono</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" name="id_centro" id="autocompleteCE" class="autocomplete">
                        <label>Centro Escolar</label>
                        <input type="hidden" id="idce" name="idce">
                    </div>

                    <div class="input-field col s12 m4">
                        <i class="material-icons prefix">today</i>
                        <select id="turno" name="turno">
                            <option value="" disabled selected>Elige una opción</option>
                            <option value="0">Matutino</option>
                            <option value="1">Vespertino</option>
                        </select>
                        <label>Turno educativo</label>
                    </div>

                </div>

                <div class="row">

                    <div class="input-field col s12 m3">
                        <i class="material-icons prefix">today</i>
                        <select name="clase" id="clase">
                            <option value="" disabled selected>Seleccionar</option>
                            @foreach ($class as $clase)
                            <option value="{{ $clase->id_class}}">{{ $clase->id_class }}</option>
                            @endforeach
                        </select>
                        <label>CLASS</label>
                    </div>

                    <div class="input-field col s12 m3">
                        <i class="material-icons prefix">done</i>
                        <select id="estado" name="estado">
                            <option value="" disabled selected>Elige una opción</option>
                            <option value="0">Activo</option>
                            <option value="1">Inactivo</option>
                        </select>
                        <label>Estado</label>
                    </div>

                </div>

                <button class="btn waves-effect waves-light blue-grey lighten-2" type="submit">Actualizar informacion<i class="material-icons right">add</i></button>

            </div>
        </form>

        <!--Tabla responsables-->
        <header>
            <h5>Responsables de Alumno</h5>
        </header>

        <div class="card-panel" style="border-radius: 7px;">

            <button class="waves-effect waves-light blue-grey lighten-2 btn modal-trigger" href="#modalResponsables" style="margin-bottom: 20px;">
                <i class="material-icons">add</i> Agregar Responsable
            </button>

            <button class="waves-effect waves-light blue-grey lighten-2 btn modal-trigger" href="#modalTipoResponsables" style="margin-bottom: 20px;">
                    <i class="material-icons">add</i> Agregar Tipo de Responsable
            </button>

            <button class="waves-effect waves-light blue-grey lighten-2 btn modal-trigger" href="#modalOcupacion" style="margin-bottom: 20px;">
                    <i class="material-icons">add</i> Agregar Ocupacion
            </button>

            <table class="highlight responsive-table" style="font-size: 10px">
                <thead>
                    <tr>
                        <th>DUI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Parentesco</th>
                        <th>Ocupacion</th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($responsable as $item)
                    <tr>
                        <td>{{ $item->dui }}</td>
                        <td>{{ $item->nombres }}</td>
                        <td>{{ $item->apellidos }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>{{ $item->tipo_responsable }}</td>
                        <td>{{ $item->ocupacion }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <!--Tabla CE-->
        <header>
            <h5>Centros Escolares</h5>
        </header>

        <div class="card-panel" style="border-radius: 7px;">

            <table class="highlight responsive-table" style="font-size: 10px">
                <thead>
                    <tr>
                        <th>Centro Escolar</th>
                        <th>Grado Academico</th>
                        <th>Año</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bitacora as $item)
                    <tr>
                        <td>{{ $item->nombre_centro_educativo }}</td>
                        <td>{{ $item->grado_cursado }}</td>
                        <td>{{ $item->anho }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


    <!-- modal registro de nuevos responsables -->
    <div id="modalResponsables" class="modal">
        <div class="modal-content">
            <h5>Responsable</h5>
            <form class="col s12" id="addResponsable">
                @csrf
                <input id="carnet_alumno" name="carnet_alumno" type="hidden" value="{{  $alumno }}">
                <div class="row">
                    <div class="input-field col s12 m4">
                        <i class="material-icons prefix">account_box</i>
                        <input id="dui" name="dui" type="text">
                        <label for="dui">DUI</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <i class="material-icons prefix">person</i>
                        <input id="nombres" name="nombres" type="text">
                        <label for="nombres">Nombres</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <i class="material-icons prefix">person</i>
                        <input id="apellidos" name="apellidos" type="text">
                        <label for="apellidos">Apellidos</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m4">
                        <i class="material-icons prefix">local_phone</i>
                        <input id="telefono" name="telefono" type="text" class="validate">
                        <label for="telefono">Telefono</label>
                    </div>
                    <div class="input-field col s12 m8">
                        <i class="material-icons prefix">home</i>
                        <input id="direccion" name="direccion" type="text" class="validate">
                        <label for="direccion">Direccion</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">accessibility</i>
                        <select id="id_tipo_responsable" name="id_tipo_responsable">
                            <option value="" disabled selected>Seleccionar Tipo de Responsable</option>
                            @foreach ($tipoResponsable as $tipo)
                                <option value="{{ $tipo->id_tipo_responsable}}">{{ $tipo->tipo_responsable }}</option>
                             @endforeach
                        </select>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">build</i>
                        <select name="id_ocupacion" id="id_ocupacion">
                            <option value="" disabled selected>Seleccionar Ocupacion</option>
                            @foreach ($ocupacion as $ocu)
                                <option value="{{ $ocu->id_ocupacion}}">{{ $ocu->ocupacion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <button class="btn waves-effect waves-light blue-grey lighten-2" type="submit" name="action">Guardar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- modal registro de nuevos tipos de responsables -->
    <div id="modalTipoResponsables" class="modal">
        <form class="col s12" id="addTipoResponsable">
            @csrf
            <div class="modal-content">
                <h5>Tipo de Responsable</h5>
                <div class="row">
                    <div class="col s3">
                        <ul class="collection">
                            @foreach ($tipoResponsable as $tipo)
                                <li class="collection-item">{{ $tipo->tipo_responsable }}</li>
                             @endforeach
                        </ul>
                    </div>
                    <div class="input-field col s9">
                        <div class="input-field col s9">
                            <i class="material-icons prefix">accessibility</i>
                            <input id="tipo_responsable" name="tipo_responsable" type="text" class="validate">
                            <label for="tipo_responsable">Tipo de Responsable</label>
                        </div>
                        <div class="col s9">
                                <button class="btn waves-effect waves-light blue-grey lighten-2" type="submit" name="action">Guardar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- modal registro de nuevas Ocupaciones -->
    <div id="modalOcupacion" class="modal">
            <form class="col s12" id="addOcupacion">
                @csrf
                <div class="modal-content">
                    <h5>Nueva Ocupacion</h5>
                    <div class="row">
                        <div class="col s3">
                            <ul class="collection">
                                @foreach ($ocupacion as $ocu)
                                    <li class="collection-item">{{ $ocu->ocupacion }}</li>
                                 @endforeach
                            </ul>
                        </div>
                        <div class="input-field col s9">
                            <div class="input-field col s9">
                                <i class="material-icons prefix">build</i>
                                <input id="ocupacion" name="ocupacion" type="text" class="validate">
                                <label for="ocupacion">Ocupacion</label>
                            </div>
                            <div class="col s9">
                                    <button class="btn waves-effect waves-light blue-grey lighten-2" type="submit" name="action">Guardar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>

@endsection
