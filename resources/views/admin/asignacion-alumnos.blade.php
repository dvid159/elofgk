@extends('layout.admin')

@section('js')
<script src="{{ asset('js/alumnoseccion.js') }}"></script>
@endsection

@section('contenido')

<!--encabezado-->
<header>
    <h5>Asignacion de Alumnos a Secciones</h5>
</header>

<div class="fondo-cuerpo">

    <!--formulario nuevo registro-->
    <div class="row primer-fila" id="filtro-alumno-secciones">
        <!--Class-->
        <div class="input-field col s12 m4">
            <select>
                <option value="">Elegir CLASS</option>
            </select>
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
                    <tr>
                        <th style="width: 40%;">ALUMNO</th>
                        <th style="width: 20%;">A1</th>
                        <th style="width: 20%;">A2</th>
                        <th style="width: 20%;">A3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>David Mauricio Fuentes Garcia</td>
                        <td><label>
                                <input type="checkbox" class="filled-in" checked="checked" />
                                <span> </span>
                            </label>
                        </td>
                        <td><label>
                                <input type="checkbox" class="filled-in" checked="checked" />
                                <span> </span>
                            </label>
                        </td>
                        <td><label>
                                <input type="checkbox" class="filled-in" checked="checked" />
                                <span> </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>Eduardo Enrique Peña Escalante</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nelson Alfredo Salazar Salazar</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



</div>


@endsection