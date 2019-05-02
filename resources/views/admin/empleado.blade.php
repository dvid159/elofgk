 @extends('layout.admin')

 @section('js')
 <script src="{{ asset('js/empleado.js') }}"></script>
 @endsection

 @section('contenido')
 <div class="container" style="width: 90%;">

     <!--encabezado-->
     <header>
         <h5>Empleados</h5>
     </header>

     <ul class="collapsible">
         <li>
             <div class="collapsible-header"><i class="material-icons">add</i>Agregar Empleado</div>

             <div class="collapsible-body asignacion-seccion">
                 <form id="addform">
                     @csrf
                     <div class="row primer-fila">
                         <div class="input-field col s12 m4">
                             <i class="material-icons prefix">account_circle</i>
                             <input name="nombre" id="lblNombre" type="text" class="validate">
                             <label for="lblNombre">Nombre</label>
                         </div>

                         <div class="input-field col s12 m4">
                             <i class="material-icons prefix">account_circle</i>
                             <input name="apellido" id="lblApellido" type="text" class="validate">
                             <label for="lblApellido">Apellidos</label>
                         </div>

                         <div class="input-field col s12 m4">
                             <p>
                                 <label>Sexo:</label>
                                 <label>
                                     <input id="sexo" name="sexo" value="F" type="radio" />
                                     <span>F</span>
                                 </label>
                                 <label>
                                     <input id="sexo" name="sexo" value="M" type="radio" />
                                     <span>M</span>
                                 </label>
                             </p>
                         </div>
                     </div>
                     <div class="row segunda-fila">
                         <div class="input-field col s12 m4">
                             <i class="material-icons prefix">date_range</i>
                             <input id="fecha" name="fecha" type="text" class="datepicker">
                             <label for="fecha">Fecha de Nacimiento</label>
                         </div>

                         <div class="input-field col s12 m4">
                             <i class="material-icons prefix">picture_in_picture</i>
                             <input name="dui" id="lblDUI" type="text" class="validate">
                             <label for="lblDUI">DUI</label>
                         </div>

                         <div class="input-field col s12 m4">
                             <i class="material-icons prefix">picture_in_picture</i>
                             <input name="nit" id="lblNIT" type="text" class="validate">
                             <label for="lblNIT">NIT</label>
                         </div>
                     </div>
                     <div class="row tercera-fila">

                         <div class="input-field col s12 m4">
                             <i class="material-icons prefix">payment</i>
                             <input name="carnet" id="lblCarnet" type="text" class="validate">
                             <label for="lblCarnet">Carnet</label>
                         </div>

                         <div class="input-field col s12 m4">
                             <select id="cargo" name="cargo">
                                 <option disabled selected>Seleccione Cargo</option>
                                 @foreach ($cargo as $c)
                                 <option value="{{ $c->id_cargo }}">{{ $c->cargo }}</option>
                                 @endforeach
                             </select>
                             <label>Cargo</label>
                         </div>

                         <div class="input-field col s12 m4">
                             <input name="telefono" id="lblTelefono" type="text" class="validate">
                             <label for="lblTelefono">Telefono</label>
                         </div>

                         <div class="input-field col s12 m4">
                             <select id="municipio" name="municipio">
                                 <option disabled selected>Seleccione Municipio</option>
                                 @foreach ($municipio as $m)
                                 <option value="{{ $m->id_municipio }}">{{ $m->municipio }}</option>
                                 @endforeach
                             </select>
                             <label>Municipio</label>
                         </div>

                         <div class="input-field col s12 m8">
                            <input name="direccion" id="lblDireccion" type="text" class="validate">
                            <label for="lblDireccion">Direccion</label>
                        </div>

                     </div>

                     <div class="row cuarta-fila">
                         <div class="input-field col s12">
                             <input name="observaciones" id="lblObservaciones" type="text" class="validate">
                             <label for="lblObservaciones">Observaciones</label>
                         </div>
                     </div>
                     <!--Boton agregar-->
                     <button class="waves-effect waves-light btn add blue-grey lighten-2">
                         <i class="material-icons right">add</i>Agregar</button>
                 </form>
             </div>
         </li>
     </ul>

     <!--Tabla-->
     <div id="dataTable">
         <div class="card-panel">
             <table id="example" class="mdl-data-table responsive-table striped" style="width:100%">
                 <thead>
                     <tr>
                         <th style="width: 10%;">Carnet</th>
                         <th style="width: 10%;">Cargo</th>
                         <th style="width: 25%;">Nombres</th>
                         <th style="width: 25%;">Apellidos</th>
                         <th style="width: 15%;">Telefono</th>
                         <th style="width: 15%;"></th>
                     </tr>
                 </thead>
                 <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->carnet_empleado }}</td>
                        <td>{{ $item->cargo }}</td>
                        <td>{{ $item->nombres }}</td>
                        <td>{{ $item->apellidos }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>
                            <button class="waves-effect waves-light btn-small blue-grey lighten-2 edit"
                                data-id="{{ $item->carnet_empleado }}">
                                <i class="material-icons">edit</i></button>

                            <button class="waves-effect waves-light btn-small red delete"
                                data-id="{{ $item->carnet_empleado }}">
                                <i class="material-icons">delete</i></button>
                        </td>
                    </tr>
                    @endforeach
                 </tbody>
             </table>
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
                 <div class="input-field col s12 m4">
                     <i class="material-icons prefix">account_circle</i>
                     <input name="nombre" id="lblNombre" type="text" class="validate">
                     <label for="lblNombre">Nombre</label>
                 </div>

                 <div class="input-field col s12 m4">
                     <i class="material-icons prefix">account_circle</i>
                     <input name="apellido" id="lblApellido" type="text" class="validate">
                     <label for="lblApellido">Apellidos</label>
                 </div>

                 <div class="input-field col s12 m4">
                     <p>
                         <label>Sexo:</label>
                         <label>
                             <input id="sexo" name="sexo" value="F" type="radio" />
                             <span>F</span>
                         </label>
                         <label>
                             <input id="sexo" name="sexo" value="M" type="radio" />
                             <span>M</span>
                         </label>
                     </p>
                 </div>

                 <div class="input-field col s12 m4">
                     <i class="material-icons prefix">date_range</i>
                     <input id="fecha" name="fecha" type="text" class="datepicker">
                     <label for="fecha">Fecha de Nacimiento</label>
                 </div>

                 <div class="input-field col s12 m4">
                     <i class="material-icons prefix">picture_in_picture</i>
                     <input name="dui" id="lblDUI" type="text" class="validate">
                     <label for="lblDUI">DUI</label>
                 </div>

                 <div class="input-field col s12 m4">
                     <i class="material-icons prefix">picture_in_picture</i>
                     <input name="nit" id="lblNIT" type="text" class="validate">
                     <label for="lblNIT">NIT</label>
                 </div>

                 <div class="input-field col s12 m4">
                     <i class="material-icons prefix">payment</i>
                     <input name="carnet" id="lblCarnet" type="text" class="validate">
                     <label for="lblCarnet">Carnet</label>
                 </div>

                 <div class="input-field col s12 m4">
                     <select id="cargo" name="cargo">
                         <option disabled selected>Seleccione Cargo</option>
                         @foreach ($cargo as $c)
                         <option value="{{ $c->id_cargo }}">{{ $c->cargo }}</option>
                         @endforeach
                     </select>
                     <label>Cargo</label>
                 </div>

                 <div class="input-field col s12 m4">
                     <input name="telefono" id="lblTelefono" type="text" class="validate">
                     <label for="lblTelefono">Telefono</label>
                 </div>

                 <div class="input-field col s12 m4">
                     <select id="municipio" name="municipio">
                         <option disabled selected>Seleccione Municipio</option>
                         @foreach ($municipio as $m)
                         <option value="{{ $m->id_municipio }}">{{ $m->municipio }}</option>
                         @endforeach
                     </select>
                     <label>Municipio</label>
                 </div>

                 <div class="input-field col s12 m8">
                        <input name="direccion" id="lblDireccion" type="text" class="validate">
                        <label for="lblDireccion">Direccion</label>
                    </div>

                    <div class="input-field col s12">
                            <input name="observaciones" id="lblObservaciones" type="text" class="validate">
                            <label for="lblObservaciones">Observaciones</label>
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
