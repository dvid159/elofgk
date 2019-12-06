@extends('layout.admin')

@section('js')
 <script src="{{ asset('js/alumno.js') }}"></script>
 <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
 <script type="text/javascript">
    $(document).ready(function(){
        $('#grid').DataTable();
    }
</script>
 @endsection

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
        <table id="grid" class="highlight responsive-table">
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
