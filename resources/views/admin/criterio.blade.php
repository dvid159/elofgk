@extends('layout.admin')

@section('js')
<script src="{{ asset('js/criterio.js') }}"></script>
@endsection

@section('contenido')
<div class="container">
    <!--encabezado-->
    <header>
        <h5>Criterios de Evaluacion Aptitudinal</h5>
    </header>

    <div class="fondo-cuerpo">
        <form id="addform">
            @csrf
            <div class="row nuevo-registro">
                <!--input nuevo-->
                <div class="input-field nuevo col s12 m4">
                    <input id="lblCriterio" type="text" name="criterio">
                    <label for="nuevo" class="blue-grey-text text-lighten-2 lbl-input-nuevo">Criterio
                        Aptitudinal</label>
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
                            <th style="width: 70%;">Criterio de Evaluación</th>
                            <th style="width: 20%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id_criterio }}</td>
                            <td>{{ $item->nombre_criterio }}</td>
                            <td>
                                <button class="waves-effect waves-light btn-small blue-grey lighten-2 edit"
                                    data-id="{{ $item->id_criterio }}">
                                    <i class="material-icons">edit</i></button>

                                <button class="waves-effect waves-light btn-small red delete"
                                    data-id="{{ $item->id_criterio }}">
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
                <div class="input-field nuevo col s12">
                    <input id="lblCriterio" type="text" name="criterio">
                    <label for="nuevo" class="blue-grey-text text-lighten-2 lbl-input-nuevo">Criterio
                        Aptitudinal</label>
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
