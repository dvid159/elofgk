<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
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

    <link rel="stylesheet" href="{{ asset('js/alertifyJS/css/alertify.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('js/alertifyJS/css/themes/semantic.min.css') }}" />
    <script src="{{ asset('js/alertifyJS/alertify.min.js') }}"></script>

    

    @yield('js')

    <title>{{ 'Home Expediente' }}</title>
</head>

<body>    
        <nav id="nav_admin">
            <div class="nav-wrapper">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                <!-- Right Side Of Navbar -->
                <ul class="right">                    
                    <li>
                        <a><i class="material-icons">notifications</i></a>
                    </li>
                    <li>
                        <a>{{ Auth::user()->carnet }}</a>
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">                                                
                                {{ __('Cerrar Sesión') }}
                            </a>
                        </form>
                    </li>
                </ul>

            </div>
        </nav>    
    <!--MENU-->
    <div>
        <ul id="slide-out" class="sidenav sidenav-fixed z-depth-3">
        <div id="menu_logo"> <img id="logo" src="{{ asset('img/oportunidades.png') }}"></div>
            <li>
                <div class="user-view encabezado-aside">
                    <!-- <div>
                        <img id="logo" src="{{ asset('img/logo_oportunidades_login.png') }}">
                    </div> -->
                    <a href="#name"><span class="blue-grey-text text-lighten-1 name"> <div class="chip"><img src="../img/user_round.png" alt="Contact Person"> {{ Auth::user()->name }} </div></span></a>
                    <a href="#email"><span class="blue-grey-text text-lighten-1 email">Rol: Administrador</span></a>
                </div>
            </li>
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header waves-effect principal-item"><i class="material-icons">settings</i>Datos Generales</div>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/admin/departamentos" class="waves-effect secundary-item">Departamentos</a></li>
                            <li><a href="/admin/municipios" class="waves-effect secundary-item">Municipios</a></li>
                            <li><a href="/admin/school" class="waves-effect secundary-item">Centros Educativos</a></li>
                            <li><a href="/admin/clases" class="waves-effect secundary-item">Clases</a></li>
                            <li><a href="/admin/secciones" class="waves-effect secundary-item">Secciones</a></li>
                            <li><a href="/admin/materias" class="waves-effect secundary-item">Materias</a></li>
                            <li><a href="/admin/criterios" class="waves-effect secundary-item">Criterios Aptitudinales</a></li>
                            <li><a href="/admin/aptitudes" class="waves-effect secundary-item">Aptitudes</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header waves-effect principal-item"><i class="material-icons">assignment_ind</i>Personal</div>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/admin/cargos" class="waves-effect secundary-item">Cargos</a></li>
                            <li><a href="/admin/empleados" class="waves-effect secundary-item">Empleados</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header waves-effect principal-item"><i class="material-icons">assignment</i>Año en Curso</div>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/admin/asignacion-docentes" class="waves-effect secundary-item">Asignación Secciones-Docentes</a></li>
                            <li><a href="/admin/asignacion-alumnos" class="waves-effect secundary-item">Asignación Secciones-Alumnos</a></li>
                            <li><a href="#" class="waves-effect">Asignación de Evaluaciones Apt.</a></li>
                        </ul>
                    </div>
                </li>
                <li>



          
                    <div class="collapsible-header waves-effect principal-item" ><i class="material-icons">school</i>Alumnos</div>

                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/admin/alumnos" class="waves-effect secundary-item">Listado de Alumnos</a></li>
                        </ul>
                    </div>
                </li>






                <li>
                    <div class="collapsible-header waves-effect principal-item"><i class="material-icons">assessment</i>Record de Alumnos</div>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/admin/record_escolar" class="waves-effect secundary-item">Promedios Centro Escolar</a></li>
                            <li><a href="/admin/record_fgk" class="waves-effect secundary-item">Promedios Materias Oportunidades</a></li>
                            <li><a href="#" class="waves-effect secundary-item">Promedios Aptitudinales</a></li>
                            <li><a href="/admin/consolidados" class="waves-effect secundary-item">Promedios Consolidados</a></li>
                        </ul>

                    </div>

                </li>




            </ul>
        </ul>
    </div>
    <main>
        @yield('contenido')
    </main>

</body>

</html>