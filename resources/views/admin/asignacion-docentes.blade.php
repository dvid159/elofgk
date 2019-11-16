@extends('layouts.admin')

@section('js')
<script src="{{ asset('js/grupomateria.js') }}"></script>
@endsection

@section('contenido')

<div class="container">

    <!--encabezado-->
    <header>
        <h5>Asignacion de Secciones a Docentes</h5>
    </header>

    <ul class="collapsible">
        <li>
            <div class="collapsible-header"><i class="material-icons">add</i>Realizar Asignación</div>
            <div class="collapsible-body asignacion-seccion">
                <form id="addform">
                    @csrf
                    <!--formulario nuevo registro-->
                    <div class="row primer-fila">

                        <!--seccion-->
                        <div class="input-field col s12 m3">
                            <select name="seccion" id="seccion">
                                <option value="" disabled selected>Seleccionar</option>
                                @foreach ($seccionesdb as $sec)
                                <option value="{{ $sec->id_seccion}}">{{ $sec->id_seccion}}</option>
                                @endforeach
                            </select>
                            <label class="lbl-select">Sección</label>
                        </div>

                        <!--Materia-->
                        <div class="input-field col s12 m3">
                            <select name="materia" id="materia">
                                <option value="" disabled selected>Elegir materia</option>
                                @foreach($materiasdb as $mat)
                                <option value="{{ $mat->id_materia }}">{{$mat->nombre_materia}}</option>
                                @endforeach
                            </select>
                            <label class="lbl-select">Materia</label>
                            <input type="hidden" id="idmat" name="idmat">
                        </div>

                        <!--docente-->
                        <div class="input-field col s12 m6">
                            <select name="docente" id="docente">
                                <option value="" disabled selected>Elegir Docente</option>
                                @foreach($docentesdb as $doc)
                                <option value="{{ $doc->carnet_empleado }}">{{$doc->nombres}} {{$doc->apellidos}}
                                </option>
                                @endforeach
                            </select>
                            <label class="lbl-select">Docente</label>
                        </div>

                    </div>
                    <div class="row segunda-fila">

                        <!--año-->
                        <div class="input-field col s12 m3">
                            <i class="material-icons prefix">date_range</i>
                            <input name="anio" id="lblEgreso" type="number" min="2012" max="2100" class="validate">
                            <label for="lblanio">Año</label>
                        </div>

                        <!--descripcion-->
                        <div class="input-field col s12 m9">
                            <textarea id="textarea1"  name="descripcion" class="materialize-textarea"></textarea>
                            <label for="textarea1">Descripción</label>
                        </div>

                    </div>

                    <!--Boton agregar-->
                    <button class="btn waves-effect waves-light blue-grey lighten-2" type="submit">Agregar<i
                            class="material-icons right">add</i></button>

                </form>
            </div>
        </li>
    </ul>

    <!--Tabla-->
    <div id="dataTable" class="responsive-table striped">
        <div class="card-panel">
            <table id="example" class="mdl-data-table" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 20%;">Seccion</th>
                        <th style="width: 20%;">Materia</th>
                        <th style="width: 40%;">Docente</th>
                        <th style="width: 20%;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gruposdb as $grupo)
                    <tr>
                            <td>{{ $grupo->id_seccion }}</td>
                            <td>{{ $grupo->nombre_materia }}</td>
                            <td>{{ $grupo->nombres }} {{ $grupo->apellidos }}</td>
                            <td>
                                <a class="waves-effect waves-light btn-small blue-grey lighten-2 modal-trigger"
                                href="edits/editDepartameto.php?id=1" data-target="EditDepartamento" data-id="1">
                                <i class="material-icons">edit</i></a>
                            </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection