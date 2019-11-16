@extends('layouts.admin')

@section('js')
 <!-- <script src="{{ asset('js/alumnodetalles.js') }}"></script> -->
 @endsection

@section('contenido')

<div class="container">
    <!--encabezado-->
    <header>
        <h5>Detalle de Alumnos</h5>
    </header>

    

    <div class="card-panel">
    <div class="row nuevo-registro">
        <!--Boton agregar-->
        <a href="/nuevo-alumno" class="btn waves-effect waves-light blue-grey lighten-2">
        Registrar nuevo alumno<i class="material-icons right">add</i></a>
    </div>
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
                    <td>
                        <a href="{{ route('alumnos.edit',$item->carnet_alumno) }}">{{  $item->carnet_alumno }}</a>
                    </td>

                    <td>{{ $item->nombres }}</td>
                    <td>{{ $item->apellidos }}</td>
                    <td>{{ $item->id_class }}</td>

                    @if ($item->turno_educativo==0)
                        <td>Matutino</td>
                    @else
                        <td>Vespertino</td>
                    @endif

                    @if ($item->estado==1)
                        <td style="color: rgba(74, 209, 21, 0.911);">Activo</td>
                    @else
                        <td style="color: rgba(209, 21, 46, 0.91);">Inactivo</td>
                    @endif
                </tr>
                @endforeach
             </tbody>

        </table>
    </div>
</div>

@endsection
