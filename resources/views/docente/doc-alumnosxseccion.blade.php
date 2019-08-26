@extends('layout.docente')

@section('js')
<script src="{{ asset('js/doc-alumnosxseccion.js') }}"></script>
@endsection

@section('contenido')
<div class="container">
    <!--encabezado-->
    <header>
        <h5 id="encabezado">Listado de alumnos</h5>
    </header>

    <div class="fondo-cuerpo">
        
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="item-periodo active" href="#test1">Periodo 1</a></li>
                    <li class="tab col s3"><a class="item-periodo" href="#test1">Periodo 2</a></li>
                    <li class="tab col s3"><a class="item-periodo" href="#test3">Periodo 3</a></li>
                    <li class="tab col s3"><a class="item-periodo" href="#test4">Periodo 4</a></li>
                </ul>
            </div>
        </div>
        
        <div class="row">
             <!--Boton agregar-->
             <a id="btnGuardar-notas" class="waves-effect waves-light btn modal-trigger grey" href="/evaluaciones"><i
                class="material-icons right">save</i>Evaluaciones del Periodo</a>
        </div>

        <div class="row">

            <!--Boton agregar-->
            <a id="btnGuardar-notas" class="waves-effect waves-light btn modal-trigger grey" href="#AddDepartamento"><i
                    class="material-icons right">save</i>Guardar</a>

            <!--Boton exportar-->
            <a id="btnGuardar-notas" class="waves-effect waves-light btn modal-trigger grey" href="#AddDepartamento"><i
                    class="material-icons right">import_export</i>Exportar plantilla excel </a>

            <!--Boton importar-->
            <a id="btnGuardar-notas" class="waves-effect waves-light btn modal-trigger grey" href="#AddDepartamento"><i
                    class="material-icons right">import_export</i>Importar datos de excel</a>
        </div>

        <!--Tabla-->
        <div id="tablaNotas" class="responsive-table striped">
            <div class="card-panel">
                <table id="example" class="mdl-data-table" style="width:100%">
                    <thead class="table-notas-head">
                        <tr>
                            <th style="width: 30%;"></th>
                            <th>Exposiciones</th>
                            <th>Evaluacion 1</th>
                            <th>Evaluacion 2</th>
                            <th>Evaluacion 3</th>
                            <th>Promedio</th>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Alumnos</th>
                            <th>10%</th>
                            <th>20%</th>
                            <th>20%</th>
                            <th>50%</th>
                            <th>100%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 30%;">Fuentes Garcia, David Mauricio</td>
                            <td>10</td>
                            <td>8</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td>9</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Peña Escalante, Eduardo Enrique</td>
                            <td>9</td>
                            <td>8</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Salazar Salazar, Nelson Alfredo</td>
                            <td>8</td>
                            <td>9</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td>9</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection