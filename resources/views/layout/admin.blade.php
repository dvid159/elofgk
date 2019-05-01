<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../img/oportunidades_ico.ico" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/init.js') }}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('js/AlertifyJS/css/alertify.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('js/AlertifyJS/css/themes/semantic.min.css') }}" />
    <script src="{{ asset('js/AlertifyJS/alertify.min.js') }}"></script>

    @yield('js')

    <title>Expediente FGK</title>
</head>

<body>
    <!--MENU-->
    <ul id="slide-out" class="sidenav sidenav-fixed z-depth-3">
        <li>
            <div class="user-view encabezado-aside">
                <div>
                    <img id="logo" src="{{ asset('img/oportunidades.png') }}">
                </div>
                <a href="#name"><span class="blue-grey-text text-lighten-1 name">Nombre Usuario</span></a>
                <a href="#email"><span class="blue-grey-text text-lighten-1 email">Rol</span></a>
            </div>
        </li>
        <ul class="collapsible">
            <li>
                <div class="collapsible-header waves-effect principal-item"><i class="material-icons">settings</i>Datos Generales</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/departamentos" class="waves-effect secundary-item">Departamentos</a></li>
                        <li><a href="/municipios" class="waves-effect secundary-item">Municipios</a></li>
                        <li><a href="/school" class="waves-effect secundary-item">Centros Educativos</a></li>
                        <li><a href="/clases" class="waves-effect secundary-item">Class</a></li>
                        <li><a href="/secciones" class="waves-effect secundary-item">Seccion</a></li>
                        <li><a href="/materias" class="waves-effect secundary-item">Materias</a></li>
                        <li><a href="/criterios" class="waves-effect secundary-item">Criterios Aptitudinales</a></li>
                        <li><a href="/aptitudes" class="waves-effect secundary-item">Aptitudes</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header waves-effect principal-item"><i class="material-icons">assignment_ind</i>Personal</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/cargos" class="waves-effect secundary-item">Cargos</a></li>
                        <li><a href="/empleados" class="waves-effect secundary-item">Empleados</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header waves-effect principal-item"><i class="material-icons">assignment</i>Año en Curso</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="secciones-docentes.php" class="waves-effect secundary-item">Asignación Secciones-Docentes</a></li>
                        <li><a href="alumnos-secciones.php" class="waves-effect secundary-item">Asignación Secciones-Alumnos</a></li>
                        <li><a href="#" class="waves-effect">Asignación de Evaluaciones Apt.</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header waves-effect principal-item"><i class="material-icons">school</i>Alumnos</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="alumno.php" class="waves-effect secundary-item">Nuevo Alumno</a></li>
                        <li><a href="detalle_alumno.php" class="waves-effect secundary-item">Detalle de Alumno</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

    <main>
        @yield('contenido')
    </main>
</body>

</html>
