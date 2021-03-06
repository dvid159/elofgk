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
    <script src="{{ asset('js/docente.js') }}"></script>

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

        <ul id="colapsable" class="collapsible">
        </ul>

            
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

    <main>
        @yield('contenido')
    </main>
</body>

    @include ('footer')

</html>