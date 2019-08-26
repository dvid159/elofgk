@extends('layout.docente')

@section('js')
<script src="{{ asset('js/evaluacion.js') }}"></script>
@endsection

@section('contenido')
<div class="container">
    <!--encabezado-->
    <header>
        <h5 id="encabezado">Evaluaciones</h5>
    </header>

    <div class="fondo-cuerpo">
        <!--Boton agregar-->
        <a id="btnGuardar-notas" class="waves-effect waves-light btn modal-trigger red" href="#AddDepartamento"><i
                class="material-icons right">add</i>Nueva</a>
        <!--Boton agregar-->
        <a id="btnGuardar-notas" class="waves-effect waves-light btn modal-trigger red" href="#AddDepartamento"><i
                class="material-icons right">save</i>Guardar</a>

        <!--Tabla-->
        <div id="tablaNotas" class="responsive-table striped">
            <div class="card-panel">
                <table id="example" class="mdl-data-table" style="width:100%">
                    <thead class="table-notas-head">
                        <tr>
                            <th>Evaluación</th>
                            <th>Ponderación %</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection