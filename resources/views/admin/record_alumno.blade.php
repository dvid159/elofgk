@extends('layout.admin')

@section('js')
<script src="{{ asset('js/record.js') }}"></script>
@endsection

@section('contenido')
<div class="container">
    <!--encabezado-->
    <header>
        <h5>Record de Alumnos</h5>
    </header>
    <div class="fondo-cuerpo">
        <!-- <div class="card-panel" style="border-radius: 7px;"> -->

        <div class="card transparent">

            <div class="card-tabs">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a class="active" href="#op1">Promedios Centro Escolar</a></li>
                    <li class="tab"><a href="#op2">Promedios Materias Oportunidades</a></li>
                    <li class="tab"><a href="#op3">Promedios Consolidados</a></li>
                    <li class="tab"><a href="#op4">Promedios Aptitudinales</a></li>

                </ul>
            </div>

            <div class="card-content  lighten-4">
                <!-- ------------------------------------------------------------- -->
                <div id="op1">

                    <div class="card-tabs">
                        <ul class="tabs tabs-fixed-width">
                            <li class="tab"><a class="active" href="#op1.1">NOVENO</a></li>
                            <li class="tab"><a href="#op1.2">PRIMER AÑO</a></li>
                            <li class="tab"><a href="#op1.3">SEGUNDO AÑO</a></li>
                        </ul>
                    </div>
                    <!-- ------------Tabs--------------   -->
                    <div id="op1.1">
                        <div class="input-group col s12 m4" style="width:20%;">
                            <select>
                                <option value="" disabled selected>Select Class</option>
                                <option value="1">Class 1</option>
                                <option value="2">Class 2</option>
                                <option value="3">Class 3</option>
                            </select>

                        </div>

                        <table id=dataTable class="bordered">
                            <thead>
                                <tr>
                                    <th data-field="input-name" colspan="2">
                                        <input placeholder="Nombre de Alumno" id="nombre_record" type="text" class="validate"/>
                                    </th>
                                    <th data-field="materia" colspan="5" style="text-align:center;">MATEMATICA</th>
                                    <th data-field="materia" colspan="5" style="text-align:center;">SOCIALES</th>
                                    <th data-field="materia" colspan="5" style="text-align:center;">CIENCIAS</th>
                                    <th data-field="materia" colspan="5" style="text-align:center;">LENGUAJE</th>

                                </tr>
                                <tr>
                                    <th data-field="carnet" rowspan="2">Carnet</th>
                                    <th data-field="name" rowspan="2">Nombre</th>
                                    <!-- <th data-field="año" rowspan="2">Año</th> -->

                                    <th data-field="periodo1">P1</th>
                                    <th data-field="periodo2">P2</th>
                                    <th data-field="periodo3"> P3</th>
                                    <th data-field="periodo4">P4</th>
                                    <th data-field="promedio">PROM</th>
                                    <th data-field="periodo1">P1</th>
                                    <th data-field="periodo2">P2</th>
                                    <th data-field="periodo3"> P3</th>
                                    <th data-field="periodo4">P4</th>
                                    <th data-field="promedio">PROM</th>
                                    <th data-field="periodo1">P1</th>
                                    <th data-field="periodo2">P2</th>
                                    <th data-field="periodo3"> P3</th>
                                    <th data-field="periodo4">P4</th>
                                    <th data-field="promedio">PROM</th>
                                    <th data-field="periodo1">P1</th>
                                    <th data-field="periodo2">P2</th>
                                    <th data-field="periodo3"> P3</th>
                                    <th data-field="periodo4">P4</th>
                                    <th data-field="promedio">PROM</th>

                                </tr>
                            </thead>

                            <tbody>


                                <tr>
                                    <td>2019-SA-FT-001</td>
                                    <td>Nombre1 Nombre2 Apellido1 Apellido2</td>
                                    <!-- <td>Segundo año</td> -->
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                            <i class="material-icons">edit</i></button></td>


                                </tr>
                                <tr>
                                    <td>2019-SA-FT-002</td>
                                    <td>Nombre1 Nombre2 Apellido1 Apellido2</td>
                                    <!-- <td>Segundo año</td> -->
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                            <i class="material-icons">edit</i></button></td>

                                </tr>
                                <tr>
                                    <td>2019-SA-FT-004</td>
                                    <td>Nombre1 Nombre2 Apellido1 Apellido2</td>
                                    <!-- <td>Segundo año</td> -->
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                            <i class="material-icons">edit</i></button></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>


                    <!-- ------------------------------------------------------ -->
                    <div id="op1.2">
                        <div class="input-group col s12 m4" style="width:20%;">
                            <select>
                                <option value="" disabled selected>Select Class</option>
                                <option value="1">Class 1</option>
                                <option value="2">Class 2</option>
                                <option value="3">Class 3</option>
                            </select>

                        </div>

                        <table id=dataTable class="bordered">
                            <thead>
                                <tr>
                                    <th data-field="input-name" colspan="2">
                                        <input placeholder="Nombre de Alumno" id="nombre_record" type="text" class="validate"/>
                                    </th>
                                    <th data-field="materia" colspan="5" style="text-align:center;">MATEMATICA</th>
                                    <th data-field="materia" colspan="5" style="text-align:center;">SOCIALES</th>
                                    <th data-field="materia" colspan="5" style="text-align:center;">CIENCIAS</th>
                                    <th data-field="materia" colspan="5" style="text-align:center;">LENGUAJE</th>

                                </tr>
                                <tr>
                                    <th data-field="carnet" rowspan="2">Carnet</th>
                                    <th data-field="name" rowspan="2">Nombre</th>
                                    <!-- <th data-field="año" rowspan="2">Año</th> -->

                                    <th data-field="periodo1">P1</th>
                                    <th data-field="periodo2">P2</th>
                                    <th data-field="periodo3"> P3</th>
                                    <th data-field="periodo4">P4</th>
                                    <th data-field="promedio">PROM</th>
                                    <th data-field="periodo1">P1</th>
                                    <th data-field="periodo2">P2</th>
                                    <th data-field="periodo3"> P3</th>
                                    <th data-field="periodo4">P4</th>
                                    <th data-field="promedio">PROM</th>
                                    <th data-field="periodo1">P1</th>
                                    <th data-field="periodo2">P2</th>
                                    <th data-field="periodo3"> P3</th>
                                    <th data-field="periodo4">P4</th>
                                    <th data-field="promedio">PROM</th>
                                    <th data-field="periodo1">P1</th>
                                    <th data-field="periodo2">P2</th>
                                    <th data-field="periodo3"> P3</th>
                                    <th data-field="periodo4">P4</th>
                                    <th data-field="promedio">PROM</th>

                                </tr>
                            </thead>

                            <tbody>


                                <tr>
                                    <td>2019-SA-FT-231</td>
                                    <td>Nombre1 Nombre2 Apellido1</td>
                                    <!-- <td>Segundo año</td> -->
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                            <i class="material-icons">edit</i></button></td>


                                </tr>
                                <tr>
                                    <td>2019-SA-FT-256</td>
                                    <td>Nombre1 Nombre2 Apellido1 Apellido2</td>
                                    <!-- <td>Segundo año</td> -->
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                            <i class="material-icons">edit</i></button></td>

                                </tr>
                                <tr>
                                    <td>2019-SA-FT-174</td>
                                    <td>Nombre1 Apellido1 Apellido2</td>
                                    <!-- <td>Segundo año</td> -->
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                            <i class="material-icons">edit</i></button></td>
                                </tr>
                            </tbody>
                        </table>


                    </div>

                    <!-- ------------------------------------------------------ -->
                    <div id="op1.3">
                        <div class="input-group col s12 m4" style="width:20%;">
                            <select>
                                <option value="" disabled selected>Select Class</option>
                                <option value="1">Class 1</option>
                                <option value="2">Class 2</option>
                                <option value="3">Class 3</option>
                            </select>

                        </div>

                        <table id=dataTable class="bordered">
                            <thead>
                                <tr>
                                    <th data-field="input-name" colspan="2">
                                        <input placeholder="Nombre de Alumno" id="nombre_record" type="text" class="validate"/>
                                    </th>
                                    <th data-field="materia" colspan="5" style="text-align:center;">MATEMATICA</th>
                                    <th data-field="materia" colspan="5" style="text-align:center;">SOCIALES</th>
                                    <th data-field="materia" colspan="5" style="text-align:center;">CIENCIAS</th>
                                    <th data-field="materia" colspan="5" style="text-align:center;">LENGUAJE</th>

                                </tr>
                                <tr>
                                    <th data-field="carnet" rowspan="2">Carnet</th>
                                    <th data-field="name" rowspan="2">Nombre</th>
                                    <!-- <th data-field="año" rowspan="2">Año</th> -->

                                    <th data-field="periodo1">P1</th>
                                    <th data-field="periodo2">P2</th>
                                    <th data-field="periodo3"> P3</th>
                                    <th data-field="periodo4">P4</th>
                                    <th data-field="promedio">PROM</th>
                                    <th data-field="periodo1">P1</th>
                                    <th data-field="periodo2">P2</th>
                                    <th data-field="periodo3"> P3</th>
                                    <th data-field="periodo4">P4</th>
                                    <th data-field="promedio">PROM</th>
                                    <th data-field="periodo1">P1</th>
                                    <th data-field="periodo2">P2</th>
                                    <th data-field="periodo3"> P3</th>
                                    <th data-field="periodo4">P4</th>
                                    <th data-field="promedio">PROM</th>
                                    <th data-field="periodo1">P1</th>
                                    <th data-field="periodo2">P2</th>
                                    <th data-field="periodo3"> P3</th>
                                    <th data-field="periodo4">P4</th>
                                    <th data-field="promedio">PROM</th>

                                </tr>
                            </thead>

                            <tbody>


                                <tr>
                                    <td>2019-SA-FT-021</td>
                                    <td>Nombre1 Nombre2 Apellido2</td>
                                    <!-- <td>Segundo año</td> -->
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td style="text-align:center;">-</td>
                                    <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                            <i class="material-icons">edit</i></button></td>


                                </tr>
                                <tr>
                                    <td>2019-SA-FT-257</td>
                                    <td>Nombre1 Nombre2 Apellido</td>
                                    <!-- <td>Segundo año</td> -->
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                            <i class="material-icons">edit</i></button></td>

                                </tr>
                                <tr>
                                    <td>2019-SA-FT-369</td>
                                    <td>Nombre1 Apellido1</td>
                                    <!-- <td>Segundo año</td> -->
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td style="text-align:center;">0.0</td>
                                    <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                            <i class="material-icons">edit</i></button></td>
                                </tr>
                            </tbody>
                        </table>


                    </div>


                </div>
                <!-- ------------------------------------------------------ -->
                <div id="op2">
                    <div class="card-tabs">
                        <ul class="tabs tabs-fixed-width">
                            <li class="tab"><a href="#test8">NOVENO</a></li>
                            <li class="tab"><a href="#test9">PRIMER AÑO</a></li>
                            <li class="tab"><a href="#test10">SEGUNDO AÑO</a></li>
                        </ul>
                    </div>
                

                <div id="test8"></div>
                <div id="test9"></div>
                <div id="test10"></div>
                </div>
                <!-- ----------------------------------------------------- -->


                <div id="op3">
                    <table class="bordered">
                        <thead>
                            <tr>
                                <th data-field="YEAR" colspan="2">YEAR</th>
                                <th data-field="CE" colspan="20">CENTRO ESCOLAR</th>
                                <th data-field="OP">OPORTUNIDADES</th>
                            </tr>

                            <tr>
                                <th></th>
                                <th></th>
                                <th data-field="materia" colspan="5">Matermatica</th>
                                <th data-field="materia" colspan="5">Sociales</th>
                                <th data-field="materia" colspan="5">Ciencias</th>
                                <th data-field="materia" colspan="5">Lenguaje y Literatura</th>
                            </tr>


                            <tr>

                                <th data-field="carnet" rowspan="2">Carnet</th>
                                <th data-field="name" rowspan="2">Nombre</th>
                            </tr>


                            <tr>
                                <th data-field="periodo1">P1</th>
                                <th data-field="periodo2">P2</th>
                                <th data-field="periodo3">P3</th>
                                <th data-field="periodo4">P4</th>
                                <th data-field="promedio">Prom</th>

                                <th data-field="periodo1">P1</th>
                                <th data-field="periodo2">P2</th>
                                <th data-field="periodo3">P3</th>
                                <th data-field="periodo4">P4</th>
                                <th data-field="promedio">Prom</th>

                                <th data-field="periodo1">P1</th>
                                <th data-field="periodo2">P2</th>
                                <th data-field="periodo3">P3</th>
                                <th data-field="periodo4">P4</th>
                                <th data-field="promedio">Prom</th>

                                <th data-field="periodo1">P1</th>
                                <th data-field="periodo2">P2</th>
                                <th data-field="periodo3">P3</th>
                                <th data-field="periodo4">P4</th>
                                <th data-field="promedio">Prom</th>
                            </tr>
                        </thead>

                        <tbody>


                            <tr>
                                <td>2019-SA-FT-001</td>
                                <td>nombre1 nombre2 apellido1 Apellido2</td>

                                <td>7.5</td>
                                <td>8.9</td>
                                <td>9.0</td>
                                <td>8.8</td>
                                <td>7.6</td>
                                <td>7.5</td>
                                <td>8.9</td>
                                <td>9.0</td>
                                <td>8.8</td>
                                <td>7.6</td>
                                <td>7.5</td>
                                <td>8.9</td>
                                <td>9.0</td>
                                <td>8.8</td>
                                <td>7.6</td>
                                <td>7.5</td>
                                <td>8.9</td>
                                <td>9.0</td>
                                <td>8.8</td>
                                <td>7.6</td>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <!-- -------------------------------------------- -->
                <div id="op4">En desarrollo</div>
                <!-- -------------------------------------------- -->
            </div>
        </div>

        <!-- </div> -->


    </div>
</div>
<!--fin de container-->

<!--Edit-->
<div id="ModalEditRecord" class="modal">
    <form id="editform" >
        @csrf
        <div class="modal-content">
            <h5>Edicion de Registro</h5>
            <div class="row">
                <!-- <input id="lblId" name="id" type="hidden"> -->
                <div class="input-field col s12" style="width: 35%;">
                    
                    <i class="material-icons prefix">art_track</i>
                    <input id="lblCarnet" type="text" class="" name="carnet" maxlength="14">
                    <label class="active">Carnet</label>
                </div>
                <div class="input-field col s12 m4" style="width:20%;">
                            <select>
                                <option value="" disabled selected>Select Class</option>
                                <option value="1">Class 1</option>
                                <option value="2">Class 2</option>
                                <option value="3">Class 3</option>
                            </select>

                </div>
            </div>
            <div class="row">
                <div class="input-field col s12" style="width:50%">
                     <i class="material-icons prefix">person</i>
                    <input id="lblNombre" type="text" class="validate" name="nombre">
                    <label class="">Nombre</label>
                </div>
                
                <div class="input-field col s12 m4" style="width:25%;">
                            <select>
                                <option value="" disabled selected>Periodo</option>
                                <option value="1">Periodo 1</option>
                                <option value="2">Periodo 2</option>
                                <option value="3">Periodo 3</option>
                            </select>

                </div>
                <div class="input-field col s12 m4" style="width:25%;">
                            <select>
                                <option value="" disabled selected>Año</option>
                                <option value="1">NOVENO</option>
                                <option value="2">PRIMER AÑO</option>
                                <option value="3">SEGUNDO AÑO</option>
                            </select>

                </div>
            </div>
            <div class="row">
             <!-- <div class="input-field col s12" style="width: 25%"> -->
                <label for="">MATEMATICA</label>
                <input id="mat_nota" type="textbox" required pattern="[0-9]" style="width: 60px; text-align:center;" maxlength="4">
                
            <!-- </div> -->
            <!-- <div class="input-field col s12" style="width: 25%"> -->
            <label for="">CIENCIAS</label>
                <input id="cien_nota"type="textbox" required pattern="[0-9]" style="width: 60px; text-align:center;" maxlength="4">
                
            <!-- </div> -->
            <!-- <div class="input-field col s12" style="width: 25%"> -->
            <label for="">SOCIALES</label>
                <input id="soc_nota"type="textbox" required pattern="[0-9]" style="width: 60px; text-align:center;" maxlength="4">
                
            <!-- </div> -->
            <!-- <div class="input-field col s12" style="width: 25%"> -->
            <label for="">LENGUAJE</label>
                <input id="leng_nota"type="textbox" required pattern="[0-9]" style="width: 60px; text-align:center;" maxlength="4">
                
            <!-- </div> -->
            
            </div>
            <div class="row">
            <button class="btn waves-effect waves-light blue-grey  lighten-2" type="submit">Guardar<i class="material-icons right">send</i></button>
            <button class="btn waves-effect waves-light blue-grey  lighten-2" type="submit">Exit<i class="material-icons right">exit_to_app</i></button>
            </div>
        </div>        
        
        
    </form>
</div>
@endsection