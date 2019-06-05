@extends('layout.admin')
@section('contenido')

<div class="container">
    <!--encabezado-->
    <header>
        <h5>Detalle de Alumnos</h5>
    </header>

    <div class="row nuevo-registro">
        <!--Boton agregar-->
        <a href="/nuevo-alumno" class="btn waves-effect waves-light blue-grey lighten-2">
        Registrar nuevo alumno<i class="material-icons right">add</i></a>
    </div>

    <div class="card-panel" style="border-radius: 7px;">
        <table class="highlight responsive-table">

            <thead>
                <tr>
                    <th>Carnet</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Secci&oacute;n</th>
                    <th>Turno</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>0000000000</td>
                    <td>Nombre1 Nombre2</td>
                    <td>Apellido1 Apellido2</td>
                    <td>----</td>
                    <td>Tarde</td>
                    <td>----</td>
                </tr>

                <tr>
                    <td>11111111-1</td>
                    <td>Nombre1 Nombre2</td>
                    <td>Apellido1 Apellido2</td>
                    <td>----</td>
                    <td>Mañana</td>
                    <td>----</td>
                </tr>
            </tbody>

        </table>
    </div>

</div>

@endsection