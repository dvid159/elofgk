@extends('layouts.admin')

@section('js')
<script src="{{ asset('js/alumnoseccion.js') }}"></script>
@endsection

@section('contenido')
<div class="container">
<!--encabezado-->
<header>
    <h5>Asignacion de Alumnos a Secciones</h5>
</header>

<div class="fondo-cuerpo"> 

    <!--formulario nuevo registro-->
    <div class="row primer-fila" id="filtro-alumno-secciones">
    @csrf
        <!--Class-->
            <div class="input-field col s12 m4">
                <select id="clases">
                    <option value="sin-elegir">Elegir CLASS</option>
                    @foreach ($clases as $clas)
                    <option value="{{ $clas->id_class}}">{{ $clas->id_class}}</option>
                    @endforeach
                </select>
            </div>     

            <div class="input-field col s12 m4">
                <button class="btn waves-effect waves-light blue-grey lighten-2" id="btnguardar">Guardar<i
                class="material-icons right">add</i></button>
            </div>
    </div>


    <!--Tabla-->
    <div id="dataTable">
        <div class="card-panel">
            <table id="example" class="mdl-data-table" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 40%;"></th>
                        <th colspan="3" style="width: 60%;">Secciones</th>
                    </tr>
                    <tr id="filaSecciones">
                        <th style="width: 40%;">ALUMNO</th>
                    </tr>
                </thead>
                <tbody id="tablaBody">
                </tbody>
            </table>
        </div>
    </div>



</div>
</div>

@endsection