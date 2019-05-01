@extends('layout.admin')
@section('contenido')
<div class="container">
    <!--encabezado-->
    <header>
        <h5>Class</h5>
    </header>

    <ul class="collapsible">
        <li>
            <div class="collapsible-header"><i class="material-icons">add</i>Agregar Class</div>
            <div class="collapsible-body asignacion-seccion">
                <form class="col s12" action="{{ route('clases.store') }}" method="POST">
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
            <table id="example" class="mdl-data-table striped" style="width:100%">
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
                            <div class="row">
                                <div class="col s4">
                                    <button class="waves-effect waves-light btn-small blue-grey lighten-2 modal-trigger"
                                        data-target="EditModal">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </div>
                                <div class=" col s4">
                                    <form action="{{ route('clases.destroy', $item->id_class) }}" method="POST">
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
@endsection
