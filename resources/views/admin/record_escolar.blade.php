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
        @csrf
        <div class="card transparent">
            <div class="card-content  lighten-4">

                <div class="card-tabs">
                    <ul class="tabs tabs-fixed-width">
                        <li class="tab"><a class="active" href="#op1">NOVENO</a></li>
                        <li class="tab"><a href="#op2">PRIMER AÑO</a></li>
                        <li class="tab"><a href="#op3">SEGUNDO AÑO</a></li>
                    </ul>
                </div>
                <!-- --------------------Tabs-----------------------------------------------------------------  -->
                <div id="op1">
                    <div class="input-field col s12 m4" style=" float:left; width:25%; margin:10px;">
                        <i class="material-icons prefix">class</i>
                        <select id="dropdown-lista-opciones" name="id_class" class="materialSelect">
                            <option value="" disabled selected>Select Class</option>
                            @foreach ($data as $class)
                            <option value="{{ $class->anho_egreso }}">{{ $class->anho_egreso }}</option>
                            @endforeach                           
                        </select>                        
                    </div>
                    <div class="input-field col s6" style="float:left; width:25%; margin:10px;">
                        
                        <i class="material-icons prefix">search</i>
                        <input placeholder="Nombre de Alumno" id="nombre_record" type="text" class="validate" />
                        
                    </div>
                    <div style="float:right; width:40%; margin:5px;">
                        <button class="btn waves-effect waves-light  blue-grey lighten-2 edit" style="margin:5px;">Agregar Calificaciones
                            <i class="material-icons right">add</i></button>
                    </div>
                        <!-- --------------------------Tabla------------------------- -->
                    <table id=dataTable class="bordered">
                        <thead>
                            <tr>
                                <th data-field="carnet" style="width:20%;">Carnet</th>
                                <th data-field="name" style="width:40%;">Nombre</th>
                                <th data-field="periodo1" style="text-align:center; width:10%;">PF1</th>
                                <th data-field="periodo2" style="text-align:center; width:10%;">PF2</th>
                                <th data-field="periodo3" style="text-align:center; width:10%;">PF3</th>
                                <th data-field="periodo4" style="text-align:center; width:10%;">PF</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($alumnos as $item)
                            <tr>
                                <td><a  href="#" data-id="{{ $item->carnet_alumno }}" class="resume">{{$item->carnet_alumno}}</a> </td>
                                <td>{{$item->nombres}} {{$item->apellidos}}</td>
                                <!-- <td>Segundo año</td> -->
                                <td style="text-align:center;">-</td>
                                <td style="text-align:center;">-</td>
                                <td style="text-align:center;">-</td>
                                <td style="text-align:center;">-</td>
                           </tr>
                            
                           

                           
                       
                        @endforeach
                        </tbody>
                    </table>

                </div>


                <!-- ------------------------------------------------------------------------------------------- -->
                <div id="op2">
                <div class="input-field col s12 m4" style=" float:left; width:25%; margin:10px;">
                        <i class="material-icons prefix">class</i>
                        <select id="dropdown-lista-opciones" name="id_class" class="materialSelect">
                            <option value="" disabled selected>Select Class</option>
                            @foreach ($data as $class)
                            <option value="{{ $class->anho_egreso }}">{{ $class->anho_egreso }}</option>
                            @endforeach                           
                        </select>                        
                    </div>
                    <div class="input-field col s6" style="float:left; width:25%; margin:10px;">

                    <i class="material-icons prefix">search</i>
                        <input placeholder="Nombre de Alumno" id="nombre_record" type="text" class="validate" />
                    </div>
                    <div style="float:right; width:40%; margin:5px;">
                        <button class="btn waves-effect waves-light  blue-grey lighten-2 edit" style="margin:5px;">Agregar Calificaciones
                            <i class="material-icons right">add</i></button>
                            
                    </div>

                    <table id=dataTable class="bordered">
                        <thead>

                            <tr>
                                <th data-field="carnet"style="width:20%;">Carnet</th>
                                <th data-field="name" style="width:40%;">Nombre</th>

                                <th data-field="periodo1" style="text-align:center; width:10%;">PF1</th>
                                <th data-field="periodo2" style="text-align:center; width:10%;">PF2</th>
                                <th data-field="periodo3" style="text-align:center; width:10%;">PF3</th>
                                <th data-field="periodo4" style="text-align:center; width:10%;">PF</th>


                            </tr>
                        </thead>

                        <tbody>


                            <tr>
                                <td>2019-SA-FT-001</td>
                                <td>Nombre1 Apellido1</td>
                                <!-- <td>Segundo año</td> -->
                                <td style="text-align:center;">0.0</td>
                                <td style="text-align:center;">0.0</td>
                                <td style="text-align:center;">0.0</td>
                                <td style="text-align:center;">0.0</td>

                                <!-- <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                        <i class="material-icons">edit</i></button></td> -->


                            </tr>
                            <tr>
                                <td>2019-SA-FT-002</td>
                                <td>Nombre1 Apellido1</td>
                                <!-- <td>Segundo año</td> -->
                                <td style="text-align:center;">0.0</td>
                                <td style="text-align:center;">0.0</td>
                                <td style="text-align:center;">0.0</td>
                                <td style="text-align:center;">0.0</td>

                                <!-- <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                        <i class="material-icons">edit</i></button></td> -->

                            </tr>
                            <tr>
                                <td>2019-SA-FT-004</td>
                                <td>Nombre1 Apellido1</td>
                                <!-- <td>Segundo año</td> -->
                                <td style="text-align:center;">0.0</td>
                                <td style="text-align:center;">0.0</td>
                                <td style="text-align:center;">0.0</td>
                                <td style="text-align:center;">0.0</td>

                                <!-- <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                        <i class="material-icons">edit</i></button></td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- ---------------------------------------------------------------------------------------- -->
                <div id="op3">
                <div class="input-field col s12 m4" style=" float:left; width:25%; margin:10px;">
                        <i class="material-icons prefix">class</i>
                        <select id="dropdown-lista-opciones" name="id_class" class="materialSelect">
                            <option value="" disabled selected>Select Class</option>
                            @foreach ($data as $class)
                            <option value="{{ $class->anho_egreso }}">{{ $class->anho_egreso }}</option>
                            @endforeach                           
                        </select>                        
                    </div>
                    <div class="input-field col s6" style="float:left; width:25%; margin:10px;">

                    <i class="material-icons prefix">search</i>
                        <input placeholder="Nombre de Alumno" id="nombre_record" type="text" class="validate" />
                    </div>
                    <div style="float:right; width:40%; margin:5px;">
                        <button class="btn waves-effect waves-light  blue-grey lighten-2 edit" style="margin:5px;">Agregar Calificaciones
                            <i class="material-icons right">add</i></button>
                    </div>

                    <table id=dataTable class="bordered">
                        <thead>                            
                            <tr>
                                <th data-field="carnet"style="width:20%;">Carnet</th>
                                <th data-field="name" style="width:40%;">Nombre</th>

                                <th data-field="periodo1" style="text-align:center; width:10%;">PF1</th>
                                <th data-field="periodo2" style="text-align:center; width:10%;">PF2</th>
                                <th data-field="periodo3" style="text-align:center; width:10%;">PF3</th>
                                <th data-field="periodo4" style="text-align:center; width:10%;">PF</th>


                            </tr>
                        </thead>

                        <tbody>


                            <tr>
                                <td><a href="">2019-SA-FT-001</a> </td>
                                <td>Nombre1 Apellido1</td>
                                
                                <td style="text-align:center;">7.5</td>
                                <td style="text-align:center;">8.9</td>
                                <td style="text-align:center;">9.0</td>
                                <td style="text-align:center;">7</td>

                                <!-- <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                        <i class="material-icons">edit</i></button></td> -->


                            </tr>
                            <tr>
                                <td>2019-SA-FT-002</td>
                                <td>Nombre1 Apellido1</td>
                                
                                <td style="text-align:center;">7.9</td>
                                <td style="text-align:center;">8.3</td>
                                <td style="text-align:center;">8.1</td>
                                <td style="text-align:center;">8.0</td>

                                <!-- <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                        <i class="material-icons">edit</i></button></td> -->

                            </tr>
                            <tr>
                                <td>2019-SA-FT-004</td>
                                <td>Nombre1 Apellido1</td>
                                <!-- <td>Segundo año</td> -->
                                <td style="text-align:center;">10.0</td>
                                <td style="text-align:center;">10</td>
                                <td style="text-align:center;">7.4</td>
                                <td style="text-align:center;">9.3</td>

                                <!-- <td><button class="waves-effect waves-light btn-small blue-grey lighten-2 edit">
                                        <i class="material-icons">edit</i></button></td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- --------------------End Tabs-------------------------- -->
            </div>
        </div>
    </div>
</div>

<!--fin de container-->

<!--Ingresar notas Modal-------------------------------------------------------------->
<div id="ModalEditRecord"  class="modal fade" data-backdrop="static" data-keyboard="false">
    <form id="editform">
        @csrf
        <div class="modal-content">
            <h5>Edicion de Registro</h5>
            <div class="row">
                <!-- <input id="lblId" name="id" type="hidden"> -->
                <div class="input-field col s12" style="width: 35%;">

                    <i class="material-icons prefix">art_track</i>
                    <input id="lblCarnet" type="text" class="lblarnetc" name="carnet" maxlength="14" required autocomplete="off" onkeypress="return showName(event)"  > 
                    <label class="active">Carnet</label>
                </div>
                <div class="input-field col s12 m4" style="width:20%;">
                <select requered id="dropdown-lista-opciones" name="id_class" class="materialSelect" >
                            <option value="" disabled selected>Select Class</option>
                            @foreach ($data as $class)
                            <option value="{{ $class->anho_egreso }}">{{ $class->anho_egreso }}</option>
                            @endforeach                           
                        </select>

                </div>
            </div>
            <div class="row">
                <div class="input-field col s12" style="width:50%">
                    <i class="material-icons prefix">person</i>
                    <input id="lblNombre" type="text" class="validate" name="nombre" required  autocomplete="off" disabled>
                    <!-- <label class="">Nombre</label> -->
                </div>

                <div class="input-field col s12 m4" style="width:25%;">
                    <select name="periodo">
                        <option value="" disabled selected>Periodo</option>
                        <option value="1">Periodo 1</option>
                        <option value="2">Periodo 2</option>
                        <option value="3">Periodo 3</option>
                    </select>

                </div>
                <div class="input-field col s12 m4" style="width:25%;">
                    
                    <select name="grado">
                        <option value="" disabled selected>Año Escolar</option>
                        <option value="1">NOVENO</option>
                        <option value="2">PRIMER AÑO</option>
                        <option value="3">SEGUNDO AÑO</option>
                    </select>

                </div>
            </div>
            <div class="row">
                <!-- <div class="input-field col s12" style="width: 25%"> -->
                <label for="" id="mat1" name="mat1" value="2">MATEMATICA</label>
                <input id="mat_nota" name="mat_nota" type="number" min="0" max="10" step=".01" required style="width: 60px; text-align:center;"  autocomplete="off">

                <!-- </div> -->
                <!-- <div class="input-field col s12" style="width: 25%"> -->
                <label for="" name="mat2" value="7">CIENCIAS</label>
                <input id="cien_nota" name="cien_nota" type="number" min="0" max="10" step=".01" required style="width: 60px; text-align:center;"  autocomplete="off">

                <!-- </div> -->
                <!-- <div class="input-field col s12" style="width: 25%"> -->
                <label for="" name="mat3" value="8">SOCIALES</label>
                <input id="soc_nota" name="soc_nota" type="number" min="0" max="10" step=".01" required style="width: 60px; text-align:center;"  autocomplete="off">

                <!-- </div> -->
                <!-- <div class="input-field col s12" style="width: 25%"> -->
                <label for="" name="mat4" value="6">LENGUAJE</label>
                <input id="leng_nota" name="leng_nota" type="number" min="0" max="10" step=".01" required style="width: 60px; text-align:center;"  autocomplete="off">

                <!-- </div> -->

            </div>
            <div class="row">
                <button class="btn waves-effect waves-light blue-grey  lighten-2" type="submit">Guardar<i class="material-icons right">send</i></button>               
            
            
            
            </div>
            <button id="boton-exit" class="btn waves-effect waves-light blue-grey  lighten-2 exitAdd">Exit<i class="material-icons right">exit_to_app</i></button>
        </div>        
    </form>
    
</div>
<!-- -------------Fin Ingresar Notal Modal-------------------------------------- -->

<!-- ------------Resumen calificaciones Modal-------------------------------------- -->
<div id="ModalResumeRecord" class="modal fade" data-backdrop="static" data-keyboard="false">
    <form id="resumeform">
        @csrf
        <div class="modal-content">
            <h5>Promedios de Periodo</h5>

            <div class="row">

        <table class="data" class="bordered">
            <tr>
            <th data-field="carnet"style="width:20%;">CARNET:</th>
            <td >2019-SA-FT-004</td>
                                         
            </tr>
            <tr>
            <th data-field="nombre" style="width:20%;">NOMBRE:</th>
            <td>Nombre1 Nombre2 Apellido1 Apellido2</td>
            </tr>

        </table>

            </div>
            
            <table id=dataTable class="bordered">
                        <thead>                            
                            <tr>
                                
                                <!-- <th data-field="carnet"style="width:20%;">CARNET</th>
                                <th data-field="nombre" style="width:30%;">NOMBRE</th> -->
                                <th data-field="Periodo" style="text-align:center; ">PERIODO</th>
                                <th data-field="materia1" style="text-align:center; ">MATEMATICA</th>
                                <th data-field="materia2" style="text-align:center; ">CIENCIAS</th>
                                <th data-field="materia3" style="text-align:center; ">LENGUAJE</th>
                                <th data-field="materia4" style="text-align:center; ">SOCIALES</th>
                                <th data-field="PP" style="text-align:center; ">PP</th>                               
                            </tr>
                        </thead>

                        <tbody>
                        
                            <tr>
                            <!-- <td rowspan="4">2019-SA-FT-004</td>
                            <td rowspan="4">Nombre1 Apellido1</td>                         -->
                            <th style="text-align:center;"> <a href="#" class="PResume"> 1 </a></th>
                            <td style="text-align:center;">10</td>
                            <td style="text-align:center;">7.4</td>
                            <td style="text-align:center;">9.3</td>
                            <td style="text-align:center;">9.3</td>
                            <th style="text-align:center;"> 
                            <?php                                 
                            $periodo1 = 10;
                            $periodo2 = 7.4;
                            $periodo3 = 9;
                            $periodo4 = 9;

                            $media = ($periodo1+$periodo2+$periodo3+$periodo4)/4;
                            echo $media;
                            ?> 
                            </td>
                            </th>

                            <tr>
                                <!-- <td colspan="2"></td> -->
                                <th style="text-align:center;" ><a href="#" class="PResume"> 2 </a></th>
                                <td style="text-align:center;">7.8</td>
                                <td style="text-align:center;">9.4</td>
                                <td style="text-align:center;">8</td>                                
                                <td style="text-align:center;">9.5</td>
                                <th style="text-align:center;">8</th>

                            </tr>
                            <tr>

                            <!-- <td colspan="2"></td> -->
                                <th style="text-align:center;" ><a href="#" class="PResume"> 3 </a></th>
                                <td style="text-align:center;">7.8</td>
                                <td style="text-align:center;">9.4</td>
                                <td style="text-align:center;">8</td>                                
                                <td style="text-align:center;">9.5</td>
                                <th style="text-align:center;">8</th>
                            </tr>
                            

                         
                        </tbody>
                    </table>
                    <button class="btn waves-effect waves-light blue-grey  lighten-2 exitResume">Exit<i class="material-icons right">exit_to_app</i></button>
          
          
        </div>
    </form>
</div>
<!-- ------------Fin Resumen calificaciones Modal-------------------------------------- -->
@endsection