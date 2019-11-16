@extends('layouts.admin')

@section('js')
<script src="{{ asset('js/clases.js') }}"></script>
@endsection

@section('contenido')
<div class="container">
    <!--encabezado-->
    <header>
        <h5>Clases</h5>
    </header>

    <ul class="collapsible">
        <li>
            <div class="collapsible-header"><i class="material-icons">add</i>Agregar Class</div>
            <div class="collapsible-body asignacion-seccion">
                <form id="addform">
                    @csrf
                    <!--formulario nuevo registro-->
                    <div class="row primer-fila">
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">class</i>
                            <input name="class" value="" id="lblClass" type="text" class="validate">
                            <label for="lblClass">Class</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">date_range</i>
                            <input name="ingreso" id="lblIngreso" type="number" min="2012" max="2100" class="validate">
                            <label for="lblIngreso">Año de Ingreso</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">date_range</i>
                            <input name="egreso" id="lblEgreso" type="number" min="2012" max="2100" class="validate">
                            <label for="lblEgreso">Año de Egreso</label>
                        </div>
                    </div>

                    <div class="row segunda-fila">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">insert_comment</i>
                            <textarea name="descripcion" id="lblDescripcion" class="materialize-textarea"></textarea>
                            <label for="lblDescripcion">Descripcion</label>
                        </div>
                    </div>
                    <!--Boton agregar-->
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
                        <th style="width: 40%;">Año Ingreso</th>
                        <th style="width: 40%;">Class</th>
                        <th style="width: 20%;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->anho_ingreso}}</td>
                        <td>{{ $item->id_class }}</td>
                        <td>
                            <button class="waves-effect waves-light btn-small blue-grey lighten-2 edit"
                                    data-id="{{ $item->id_class }}">
                                    <i class="material-icons">edit</i></button>

                                <button class="waves-effect waves-light btn-small delete" style="background-color: rgba(209, 21, 46, 0.91);"
                                    data-id="{{ $item->id_class }}">
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
        
            <h5>Modificar</h5>
            <div class="modal-content">
            <div class="row">
                <div class="input-field col s12 m4">
                    <i class="material-icons prefix">class</i>
                    <input name="class" value="" id="lblClass" type="text" class="validate">
                    <label for="lblClass">Class</label>
                </div>
                <div class="input-field col s12 m4">
                    <i class="material-icons prefix">date_range</i>
                    <input name="ingreso" id="lblIngreso" type="number" min="2012" max="2100" class="validate">
                    <label for="lblIngreso">Año de Ingreso</label>
                </div>
                <div class="input-field col s12 m4">
                    <i class="material-icons prefix">date_range</i>
                    <input name="egreso" id="lblEgreso" type="number" min="2012" max="2100" class="validate">
                    <label for="lblEgreso">Año de Egreso</label>
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
