@extends('layout.admin')

@section('js')
<script src="{{ asset('js/record.js') }}"></script>
@endsection

@include ('footer')

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
                <!-- --------------------Tabs-01----------------------------------------------------------------  -->
                <div id="op1">
                    <div class="input-field col s12 m4" style=" float:left; width:25%; margin:10px;">                    
                        <i class="material-icons prefix">class</i>
                        <select id="dropdown-lista-opciones class1" name="id_class" class="materialSelect1">
                            <option value="all">Select Class</option>
                            @foreach ($data as $class)
                            <option value="{{ $class->id_class }}">{{ $class->id_class }}</option>
                            @endforeach                           
                        </select>                        
                    </div>

                    <div class="input-field col s6" style="float:left; width:25%; margin:10px;">                        
                        <i class="material-icons prefix">search</i>
                        <input placeholder="Nombre de Alumno" id="nombre_recordN" type="text" class="validate"/>                        
                    </div>

                    <div style="float:right; width:40%; margin:5px;">
                        <button class="btn waves-effect waves-light  blue-grey lighten-2 edit" style="margin:5px;">Agregar Calificaciones
                            <i class="material-icons right">add</i></button>
                    </div>
                <!-- -------------------------------------------Tabla------------------------- -->
                    <table id=dataTable class="bordered">
                        <thead>
                            <tr>
                                <th data-field="carnet" style="width:20%;">Carnet</th>
                                <th data-field="name" style="width:40%;">Nombre</th>
                                <th data-field="periodo1" style="text-align:center; width:10%;">PF1</th>
                                <th data-field="periodo2" style="text-align:center; width:10%;">PF2</th>
                                <th data-field="periodo3" style="text-align:center; width:10%;">PF3</th>
                                <th data-field="periodo3" style="text-align:center; width:10%;">PF4</th>                                
                                <th data-field="periodo4" style="text-align:center; width:10%;">PF</th>
                            </tr>
                        </thead>

                        <tbody id="Tnoveno">
                       
                        </tbody>
                    </table>
                </div>

                <!-- ---------------------Tabs-02--------------------------------------------------------------------- -->
                <div id="op2">
                <div class="input-field col s12 m4" style=" float:left; width:25%; margin:10px;">
                        <i class="material-icons prefix">class</i>
                        <select id="dropdown-lista-opciones class2" name="id_class" class="materialSelect2">
                            <option value="all">Select Class</option>
                            @foreach ($data as $class)
                            <option value="{{ $class->id_class }}">{{ $class->id_class }}</option>
                            @endforeach                           
                        </select>                        
                    </div>
                    <div class="input-field col s6" style="float:left; width:25%; margin:10px;">

                    <i class="material-icons prefix">search</i>
                        <input placeholder="Nombre de Alumno" id="nombre_recordP" type="text" class="validate"/>
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
                                <th data-field="periodo3" style="text-align:center; width:10%;">PF4</th>
                                <th data-field="periodo4" style="text-align:center; width:10%;">PF</th>


                            </tr>
                        </thead>

                        <tbody id="Tprimero">
                       
                        </tbody>
                    </table>
                </div>

                <!-- ----------------------Tabs-03----------------------------------------------------------------- -->
                <div id="op3">
                <div class="input-field col s12 m4" style=" float:left; width:25%; margin:10px;">
                        <i class="material-icons prefix">class</i>
                        <select id="dropdown-lista-opciones class3" name="id_classS" class="materialSelect3">
                            <option value="all">Select Class</option>
                            @foreach ($data as $class)
                            <option value="{{ $class->id_class }}">{{ $class->id_class }}</option>
                            @endforeach                           
                        </select>                        
                    </div>
                    <div class="input-field col s6" style="float:left; width:25%; margin:10px;">

                    <i class="material-icons prefix">search</i>
                        <input placeholder="Nombre de Alumno" id="nombre_recordS" type="text" class="validate" />
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
                                <th data-field="periodo3" style="text-align:center; width:10%;">PF4</th>
                                <th data-field="periodo4" style="text-align:center; width:10%;">PF</th>


                            </tr>
                        </thead>

                        <tbody id="Tsegundo">
                      
                        </tbody>
                    </table>
                </div>
                <!-- --------------------End Tabs-------------------------- -->
            </div>
        </div>
    </div>
</div>

<!------------------fin de container------------------------>

<!-------------------------Ingresar notas Modal-------------------------------------------------------------->
<div id="ModalEditRecord"  class="modal fade" data-backdrop="static" data-keyboard="false">
    <h5>Ingreso de Calificaciones</h5>
        <div class="modal-content">
        <form id="editform">
        @csrf
            
            <div class="row">                
                <div class="input-field col s12" style="width: 35%;">

                    <i class="large material-icons prefix">art_track</i>
                    <input id="lblCarnet" type="text" class="lblarnetc" name="carnet" maxlength="14" required autocomplete="off" onkeypress="return showName(event)" /> 
                    <label class="active">Carnet</label>
                </div>
                <!-- <div class="input-field col s12 m4" style="width:20%;">
                <select requered id="dropdown-lista-opciones" name="id_class" class="materialSelect" >
                            <option value="" disabled selected>Select Class</option>
                            @foreach ($data as $class)
                            <option value="{{ $class->id_class }}">{{ $class->id_class }}</option>
                            @endforeach                           
                        </select>

                </div> -->
                <div class="input-field col s12" style="width:65%">
                    <i class="material-icons prefix">person</i>
                    <input id="lblNombre" type="text" class="validate" name="nombre"  autocomplete="off" disabled>
                    <!-- <label class="">Nombre</label> -->
                </div>
                
            </div>
            <div class="row">
                
            <div class="input-field col s12 m4" style="width:40%;">
                <i class="material-icons prefix">school</i>
                    <select name="grado" required>
                        <option value="" disabled selected>Seleccione el Año Escolar</option>
                        <option value="1">NOVENO</option>
                        <option value="2">PRIMER AÑO</option>
                        <option value="3">SEGUNDO AÑO</option>
                        
                    </select>

                </div>

            <div class="input-field col s12 m4" style="width:40%;">
            <i class="material-icons prefix">assignment_ind</i>
                    <select name="periodo" required>
                        <option value="" disabled selected> Seleccione un periodo</option>
                        <option value="1">PERIODO 1</option>
                        <option value="2">PERIODO 2</option>
                        <option value="3">PERIODO 3</option>
                        <option value="4">PERIODO 4</option>
                    </select>

                </div>            
                
            </div>
            <div class="row" >
                <!-- <div class="input-field col s12" style="width: 25%"> -->
                <i class=" material-icons prefix">library_books</i>
                <label for="" id="mat1" name="mat1" value="2">MATEMATICA</label>
                <input id="mat_nota" name="mat_nota" type="number" min="0" max="10" step=".01" required style="width: 70px; text-align:center;"  autocomplete="off">

                <!-- </div> -->
                <!-- <div class="input-field col s12" style="width: 25%"> -->
                <label for="" name="mat2" value="7">CIENCIAS</label>
                <input id="cien_nota" name="cien_nota" type="number" min="0" max="10" step=".01" required style="width: 70px; text-align:center;"  autocomplete="off">

                <!-- </div> -->
                <!-- <div class="input-field col s12" style="width: 25%"> -->
                <label for="" name="mat3" value="8">LENGUAJE</label>
                <input id="soc_nota" name="soc_nota" type="number" min="0" max="10" step=".01" required style="width: 70px; text-align:center;"  autocomplete="off">

                <!-- </div> -->
                <!-- <div class="input-field col s12" style="width: 25%"> -->
                <label for="" name="mat4" value="6">SOCIALES</label>
                <input id="leng_nota" name="leng_nota" type="number" min="0" max="10" step=".01" required style="width: 70px; text-align:center;"  autocomplete="off">

                <!-- </div> -->
               
            </div>
            <div class="row">
            <button class="btn waves-effect waves-light blue-grey  lighten-2" type="submit">Guardar<i class="material-icons right">send</i></button>                                                   
             
            </div>
            </form>
            <button id="boton-exit" class="btn waves-effect waves-light blue-grey  lighten-2 exitAdd">Exit<i class="material-icons right">exit_to_app</i></button>
        </div>        
        
    
    
    
</div>
<!-- -------------Fin Ingresar Notal Modal-------------------------------------- -->

<!-- ------------Resumen calificaciones Modal-------------------------------------- -->
<div id="ModalResumeRecord" class="modal fade" data-backdrop="static" data-keyboard="false">
    <!-- <form id="resumeform">
        @csrf -->
        
            <h5>Promedios de Periodo</h5>
            <div class="modal-content">
            <div class="row">

        <table class="data" class="bordered">
            <tr>
            <th data-field="carnet" style="width:20%;">CARNET:</th>
            <td id="Rcarnet"></td>                                         
            </tr>

            <tr>
            <th data-field="nombre" style="width:20%;">NOMBRE:</th>
            <td id="Rname"></td>
            </tr>

        </table>

            </div>
           
            <table id="dataTableResumen" class="bordered"> 
            </table>
      
            
        <button class="btn waves-effect waves-light blue-grey  lighten-2 exitResume">Exit<i class="material-icons right">exit_to_app</i>
        </button>
                    
        </div>
    <!-- </form> -->
</div>
<!-- ------------Fin Resumen calificaciones Modal-------------------------------------- -->
@endsection