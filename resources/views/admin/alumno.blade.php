@extends('layout.admin')

@section('js')
<script src="{{ asset('js/alumno.js') }}"></script>
@endsection

@include ('footer')

@section('contenido')
<div class="container">
    <!--encabezado-->
    <header>
        <h5>Nuevo Alumno</h5>
    </header>


    <form id="addform" class="col s12" autocomplete="off" enctype="multipart/form-data">
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
                            <input id="first_name" name="nombres" type="text" class="validate">
                            <label for="first_name">Nombres</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="last_name" name="apellidos" type="text" class="validate">
                            <label for="last_name">Apellidos</label>
                        </div>

                    </div>
                    <div class="row">

                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">date_range</i>
                            <input id="a_datepicker" name="fecha" type="text" class="datepicker">
                            <label for="a_datepicker">Fecha de Nacimiento</label>
                        </div>
                        <div class="input-field col s12 m6" name="sexo" id="div-genero">
                            <p> <label>Sexo</label>
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
                    <input id="direction" name="direccion" type="text" class="validate">
                    <label for="direction">Direccion</label>
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
                    <input id="phone" name="tel" type="text" class="validate">
                    <label for="phone">Numero de Telefono</label>
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
                    <select name="turno">
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
                    <select name="estado">
                        <option value="" disabled selected>Elige una opción</option>
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                    </select>
                    <label>Estado</label>
                </div>

            </div>

            <button class="btn waves-effect waves-light blue-grey lighten-2" type="submit">Agregar<i class="material-icons right">add</i></button>

        </div>
    </form>

</div>

@endsection
