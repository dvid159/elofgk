@extends('layout.admin')

@section('js')
<script src="{{ asset('js/depatamento.js') }}"></script>
@endsection

@section('contenido')
<div class="container">
    <!--encabezado-->
    <header>
        <h5>Departamentos</h5>
    </header> 

    <div class="fondo-cuerpo">
        <form id="addform">
            @csrf
            <div class="row nuevo-registro">

                <div class="input-field nuevo col s12 m4">
                    <input id="nuevo-input" type="text" name="departamento">
                    <label for="nuevo" class="blue-grey-text text-lighten-2 lbl-input-nuevo">Departamento</label>
                </div>

                <button class="waves-effect waves-light btn add blue-grey lighten-2" type="submit"><i
                        class="material-icons right">add</i>Agregar</button>
            </div>
        </form>


        <!--Tabla-->
        <div id="dataTable">
            <div class="card-panel">
                <table id="example" class="mdl-data-table responsive-table striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 10%;">N°</th>
                            <th style="width: 70%;">Departamento</th>
                            <th style="width: 20%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id_departamento }}</td>
                            <td>{{ $item->departamento }}</td>
                            <td>
                                <button class="waves-effect waves-light btn-small blue-grey lighten-2 edit"
                                    data-id="{{ $item->id_departamento }}">
                                    <i class="material-icons">edit</i></button>

                                <button class="waves-effect waves-light btn-small red delete"
                                    data-id="{{ $item->id_departamento }}">
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
        <div class="modal-content">
            <h5>Modificar</h5>
            <div class="row">
                <input id="lblId" name="id" type="hidden">
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="lblDepartamento" type="text" class="validate" name="departamento">
                    <label class="active">Departamento</label>
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
