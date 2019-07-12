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
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->carnet_alumno }}</td>
                    <td>{{ $item->nombres }}</td>
                    <td>{{ $item->apellidos }}</td>
                    <td>{{ $item->id_class }}</td>

                    @if ($item->turno_educativo==0)
                        <td>Matutino</td>
                    @else
                        <td>Vespertino</td>
                    @endif

                    @if ($item->estado==0)
                        <td>Activo</td>
                    @else
                        <td>Inactivo</td>
                    @endif
                </tr>
                @endforeach
             </tbody>

        </table>
    </div>
</div>

@endsection
