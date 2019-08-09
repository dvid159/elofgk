@extends('layout.admin')

@section('js')
<script src="{{ asset('js/centroEducativo.js') }}"></script>
@endsection

@include ('footer')

@section('contenido')
<div class="container" style="width: 95%;">

    <!--encabezado-->
    <header>
        <h5>Centros Educativos</h5>
    </header>

    <ul class="collapsible">
        <li>
            <div class="collapsible-header"><i class="material-icons">add</i>Agregar Centro Educativo</div>
            <div class="collapsible-body asignacion-seccion">
                <form id="addform">
                    @csrf
                    <div class="row primer-fila">
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">mode_edit</i>
                            <input name="codigo" value="" id="lblCodigo" type="text" class="validate">
                            <label for="lblCodigo">Codigo</label>
                        </div>

                        <div class="input-field col s12 m5">
                            <i class="material-icons prefix">textsms</i>
                            <input type="text" name="id_municipio" id="municipio" class="autocomplete">  
                            <label>Municipio</label>
                            <input type="hidden" id="idm" name="idm">
                        </div>

                        <div class="input-field col s12 m3">
                            <i class="material-icons prefix">phone</i>
                            <input name="telefono" id="lblTelefono" type="text" class="validate">
                            <label for="lblTelefono">Telefono</label>
                        </div>
                    </div>
                    <div class="row segunda-fila">
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">local_library</i>
                            <select name="sector">
                                <option value="Público">Público</option>
                                <option value="Privado">Privado</option>
                            </select>
                            <label>Sector</label>
                        </div>

                        <div class="input-field col s12 m4 ">
                            <i class="material-icons prefix">description</i>
                            <select name="categoria">
                                <option value="Centro Escolar">Centro Escolar</option>
                                <option value="Complejo Educativo">Complejo Educativo</option>
                                <option value="Instituto Nacional">Instituto Nacional</option>
                            </select>
                            <label>Categoria</label>
                        </div>

                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">pin_drop</i>
                            <select name="zona">
                                <option value="Urbano">Urbano</option>
                                <option value="Rural">Rural</option>
                            </select>
                            <label>Zona</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="material-icons prefix">school</i>
                            <input name="nombre" value="" id="lblNombre" type="text" class="validate">
                            <label for="lblNombre">Nombre</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">home</i>
                            <input name="direccion" value="" id="lblDireccion" type="text" class="validate">
                            <label for="lblDireccion">Direccion</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">insert_comment</i>
                            <textarea name="descripcion" id="lblDescripcion" class="materialize-textarea"></textarea>
                            <label for="lblDescripcion">Descripcion</label>
                        </div>
                    </div>
                    <button class="waves-effect waves-light btn add blue-grey lighten-2"><i
                            class="material-icons right">add</i>Agregar</button>
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
                        <th style="width: 10%;">Codigo</th>
                        <th style="width: 30%;">Nombre</th>
                        <th style="width: 10%;">Telefono</th>
                        <th style="width: 35%;">Direccion</th>
                        <th style="width: 15%;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->codigo_centro_educativo }}</td>
                        <td>{{ $item->nombre_centro_educativo }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>{{ $item->direccion }}</td> 

                        <td>
                            <button class="waves-effect waves-light btn-small blue-grey lighten-2 edit"
                                data-id="{{ $item->codigo_centro_educativo }}">
                                <i class="material-icons">edit</i></button>

                            <button class="waves-effect waves-light btn-small red delete"
                                data-id="{{ $item->codigo_centro_educativo }}">
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
                    <i class="material-icons prefix">mode_edit</i>
                    <input name="codigo" id="lblCodigo" type="text" class="validate">
                    <label for="lblCodigo" class="active">Codigo</label>
                </div>

                <div class="input-field col s12 m5">
                    <i class="material-icons prefix">place</i>
                    <select name="id_municipio" id="id_municipio">
                        <option disabled selected>Seleccione Municipio</option>
                        @foreach ($municipiosdb as $m)
                        <option value="{{ $m->id_municipio }}">{{ $m->municipio }}</option>
                        @endforeach
                    </select>
                    <label>Municipio</label>
                </div> 

                <div class="input-field col s12 m3">
                    <i class="material-icons prefix">phone</i>
                    <input name="telefono" id="lblTelefono" type="text" class="validate">
                    <label for="lblTelefono">Telefono</label>
                </div>

                <div class="input-field col s12 m4">
                    <i class="material-icons prefix">local_library</i>
                    <select name="sector" id="sector">
                        <option value="Público">Público</option>
                        <option value="Privado">Privado</option>
                    </select>
                    <label>Sector</label>
                </div>

                <div class="input-field col s12 m4 ">
                    <i class="material-icons prefix">description</i>
                    <select name="categoria" id="categoria">
                        <option value="Centro Escolar">Centro Escolar</option>
                        <option value="Complejo Educativo">Complejo Educativo</option>
                        <option value="Instituto Nacional">Instituto Nacional</option>
                    </select>
                    <label>Categoria</label>
                </div>

                <div class="input-field col s12 m4">
                    <i class="material-icons prefix">pin_drop</i>
                    <select name="zona" id="zona">
                        <option value="Urbano">Urbano</option>
                        <option value="Rural">Rural</option>
                    </select>
                    <label>Zona</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">school</i>
                    <input id="lblNombre" name="nombre" type="text" class="validate">
                    <label class="active">Nombre</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">home</i>
                    <input name="direccion" id="lblDireccion" type="text" class="validate">
                    <label for="lblDireccion">Direccion</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">insert_comment</i>
                    <textarea name="descripcion" id="lblDescripcion" class="materialize-textarea"></textarea>
                    <label for="lblDescripcion">Descripcion</label>
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