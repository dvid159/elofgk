@extends('layout.admin')

@section('js')
<script src="{{ asset('js/aptitud.js') }}"></script>
@endsection

@section('contenido')
<div class="container">
    <!--encabezado-->
    <header>
        <h5>Aptitudes de Evaluación</h5>
    </header>

    <div class="fondo-cuerpo">
        <form id="addform">
            @csrf
            <div class="row nuevo-registro">
                <!--input nuevo-->
                <div class="input-field nuevo col s12 m6">
                    <input id="lblAptitud" type="text" name="aptitud" autocomplete="off">
                    <label for="nuevo" class="blue-grey-text text-lighten-2 lbl-input-nuevo">Aptitud</label>
                </div>

                <!--Seleccionar-->
                <div class="input-field selectionar col s12 m4">
                    <select id="criterio" name="id_criterio">
                        <option value="" disabled selected>Seleccionar</option>
                        @foreach ($criterio as $c)
                        <option value='{{ $c->id_criterio }}'>{{ $c->nombre_criterio }}</option>
                        @endforeach
                    </select>
                    <label class="blue-grey-text text-lighten-2 lbl-input-nuevo">Criterio</label>
                </div>

                <!--Boton agregar-->
                <button class="waves-effect waves-light btn add blue-grey lighten-2" type="submit">
                    <i class="material-icons right">add</i>Agregar</button>
            </div>
        </form>

        <!--Tabla-->
        <div id="dataTable">
            <div class="card-panel">
                <table id="example" class="mdl-data-table responsive-table striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 10%;">N°</th>
                            <th style="width: 30%;">Criterio</th>
                            <th style="width: 30%;">Aptitud</th>
                            <th style="width: 30%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id_aptitud }}</td>
                            <td>{{ $item->nombre_criterio }}</td>
                            <td>{{ $item->nombre_aptitud }}</td>
                            <td>
                                <button class="waves-effect waves-light btn-small blue-grey lighten-2 edit"
                                    data-id="{{ $item->id_aptitud }}">
                                    <i class="material-icons">edit</i></button>

                                <button class="waves-effect waves-light btn-small red delete"
                                    data-id="{{ $item->id_aptitud }}">
                                    <i class="material-icons">delete</i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Edit-->
<div id="ModalEdit" class="modal">
    <form id="editform">
        @csrf
        
            <h5>Modificar</h5>
            <div class="modal-content">
            <div class="row">
                <input id="lblId" name="id" type="hidden">

                <div class="input-field nuevo col s12 m4">
                    <input id="lblAptitud" type="text" name="aptitud">
                    <label for="nuevo" class="blue-grey-text text-lighten-2 lbl-input-nuevo">Aptitud</label>
                </div>

                <div class="input-field selectionar col s12 m6">
                    <select id="criterio" name="id_criterio">
                        <option value="" disabled selected>Seleccionar</option>
                        @foreach ($criterio as $c)
                        <option value='{{ $c->id_criterio }}'>{{ $c->nombre_criterio }}</option>
                        @endforeach
                    </select>
                    <label class="blue-grey-text text-lighten-2 lbl-input-nuevo">Criterio</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light blue-grey  lighten-2" type="submit">Guardar<i
                    class="material-icons right">send</i></button>
        </div>
    </form>
</div>
@endsection
