@extends('layout.admin')

@section('contenido')
<div class="container">

    <!--encabezado-->
    <header>
        <h5>Seccion</h5>
    </header>

    <ul class="collapsible">
        <li>
            <div class="collapsible-header"><i class="material-icons">add</i>Agregar Sección</div>
            <div class="collapsible-body asignacion-seccion">
                <form class="col s12" action="{{ route('secciones.store') }}" method="POST">
                    @csrf
                    <!--formulario nuevo registro-->
                    <div class="row primer-fila">
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">class</i>
                            <input name="seccion" value="" id="lblSeccion" type="text" class="validate">
                            <label for="lblSeccion">Seccion</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <select name="class">
                                @foreach ($class as $c)
                                <option value="{{ $c->id_class }}">{{ $c->id_class }}</option>
                                @endforeach
                            </select>
                            <label class="lbl-select">Class</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">date_range</i>
                            <input name="anho" id="lblIngreso" type="number" min="2012" max="2100" class="validate">
                           <label for="lblIngreso">Año</label>
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
                        <button class="waves-effect waves-light btn add blue-grey lighten-2"><i class="material-icons right">add</i>Agregar</button>
                </form>
            </div>
        </li>
    </ul>


    <!--Tabla-->
    <div id="dataTable" >
        <div class="card-panel">
            <table id="example" class="mdl-data-table striped" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 35%;">Class</th>
                        <th style="width: 25%;">Seccion</th>
                        <th style="width: 25%;">Año</th>
                        <th style="width: 15%;"></th>
                    </tr>
                 </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id_class }}</td>
                        <td>{{ $item->id_seccion }}</td>
                        <td>{{ $item->anho }}</td>
                        <td>
                            <div class="row">
                                <div class="col s6">
                                    <button class="waves-effect waves-light btn-small blue-grey lighten-2 modal-trigger"data-target="EditModal">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </div>
                                <div class=" col s6">
                                    <form action="{{ route('secciones.destroy', $item->id_seccion) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="waves-effect waves-light btn-small red"><i class="material-icons">delete</i></button>
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
@endsection
