@extends('layout.admin')

@section('js')
<script src="{{ asset('js/municipio.js') }}"></script>
@endsection

@section('contenido')
<div class="container">

    <!--encabezado-->
    <header>
        <h5>Municipios</h5>
    </header>

    <div class="fondo-cuerpo">
        <form id="addform">
            @csrf
            <div class="row nuevo-registro">
                <div class="input-field nuevo col s12 m4">
                    <input id="nuevo-input" type="text" name="municipio" autocomplete="off">
                    <label class="blue-grey-text text-lighten-2 lbl-input-nuevo">Municipio</label>
                </div>

                <div class="input-field selectionar col s12 m4">
                    <select id="dropdown-lista-opciones" name="id_departamento" class="materialSelect">
                        <option value="" disabled selected>Seleccionar</option>
                        @foreach ($depart as $d)
                        <option value="{{ $d->id_departamento }}">{{ $d->departamento }}</option>
                        @endforeach
                    </select>
                    <label class="blue-grey-text text-lighten-2 lbl-input-nuevo">Departamento</label>
                </div>

                <button class="waves-effect waves-light btn add blue-grey lighten-2" type="submit">
                    <i class="material-icons right">add</i>Agregar</button>
            </div>
        </form>



        <!--Tabla-->
        <div id="dataTable">
            <div class="card-panel">
                <table id="example" class="mdl-data-table responsive-table striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 10%;">N°</th>
                            <th style="width: 30%;">Depto.</th>
                            <th style="width: 30%;">Municipio</th>
                            <th style="width: 30%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id_municipio }}</td>
                            <td>{{ $item->departamento }}</td>
                            <td>{{ $item->municipio }}</td>
                            <td>
                                <button class="waves-effect waves-light btn-small blue-grey lighten-2 edit"
                                    data-id="{{ $item->id_municipio }}">
                                    <i class="material-icons">edit</i></button>

                                <button class="waves-effect waves-light btn-small red delete"
                                    data-id="{{ $item->id_municipio }}">
                                    <i class="material-icons">delete</i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
                <input id="lblId" name="id" type="hidden">

                <div class="input-field nuevo col s12">
                    <input id="lblMunicipio" type="text" name="municipio">
                    <label class="blue-grey-text text-lighten-2 lbl-input-nuevo active">Municipio</label>
                </div>

                <div class="input-field selectionar col s12">
                    <label for="departamento"
                        class="blue-grey-text text-lighten-2 lbl-input-nuevo active">Departamento</label>
                    <select id="departamento" name="id_departamento">
                        <option disabled selected>Seleccionar</option>
                        @foreach ($depart as $d)
                        <option value="{{ $d->id_departamento }}">{{ $d->departamento }}</option>
                        @endforeach
                    </select>

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
