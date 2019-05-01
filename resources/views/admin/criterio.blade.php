@extends('layout.admin')
@section('contenido')
<div class="container">
    <!--encabezado-->
    <header>
        <h5>Criterios de Evaluacion Aptitudinal</h5>
    </header>

    <div class="fondo-cuerpo">
        <form class="col s12" action="{{ route('criterios.store') }}" method="POST">
            @csrf
            <div class="row nuevo-registro">
                <!--input nuevo-->
                <div class="input-field nuevo col s12 m4">
                    <input id="nuevo-input" type="text" name="criterio">
                    <label for="nuevo" class="blue-grey-text text-lighten-2 lbl-input-nuevo">Criterio
                        Aptitudinal</label>
                </div>

                <!--Boton agregar-->
                <button class="waves-effect waves-light btn add blue-grey lighten-2">
                    <i class="material-icons right">add</i>Agregar</button>
            </div>
        </form>


        <!--Tabla-->
        <div id="dataTable">
            <div class="card-panel">
                <table id="example" class="mdl-data-table striped" style="width:100%">
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
                                <div class="row">
                                    <div class="col s4">
                                        <button
                                            class="waves-effect waves-light btn-small blue-grey lighten-2 modal-trigger"
                                            data-target="EditModal">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </div>
                                    <div class=" col s4">
                                        <form action="{{ route('criterios.destroy', $item->id_criterio) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="waves-effect waves-light btn-small red"><i
                                                    class="material-icons">delete</i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
