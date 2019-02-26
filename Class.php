<?php
require_once "Controllers/ClassController.php";
require_once "Models/Clase.php";

$classController = new ClassController();
$class = $classController->GetAll();

//Para Agregar Class
if (isset($_POST['btnAgregarClass']))
{
    $new_class = new Clase();
    $new_class->setClass($_POST['txtClass']);
    $new_class->setAnhoIngreso($_POST['txtAnhoIngreso']);
    $new_class->setAnhoEgreso($_POST['txtAnhoEgreso']);
    $new_class->setDescripcion($_POST['txtDescripcion']);
    $classController->Agregar($new_class);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">

    
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>
    <script src="js/arranque.js"></script>

    <link rel="stylesheet" href="css/estilos.css">

    <title>Class</title>
</head>

<body>

    <!-- Menu -->
    <ul id="slide-out" class="sidenav sidenav-fixed">
        <li>
            <div class="user-view z-depth-3" style="height: 200px; padding: 12px;">
                <img src="img/oportunidades.png " style="width: 250px; height: 150px;">
            </div>
        </li>
        <br>
        <li><a href="Departamentos.php" class="waves-effect red-text">Departamentos</a></li>
        <li><a href="Municipios.php" class="waves-effect red-text">Municipios</a></li>
        <li><a href="Class.php" class="waves-effect red-text">Class</a></li>
        <li><a href="CentroEducativos.php" class="waves-effect red-text">Centro Educativo</a></li>
    </ul>
    
    <main>
        <!-- Encabezado -->
        <div id="header" class="row z-depth-3">
            <div class="col s12">
                <div class="teal card-panel">
                    <div class="title">
                        <p>Class</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Boton agregar-->
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large btn modal-trigger waves-effect waves-light red" href="#AddClass"><i
                    class=" material-icons">add</i></a>
        </div>

        <!--Modal Agregar-->
        <div id="AddClass" class="modal" tabindex="-1">
            <div class="modal-content">
                <h4>Nueva Class</h4>
                <div class="row">
                    <form class="col s12" role="form" action="Class.php" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="txtClass" value="" id="lblClass" type="text" class="validate">
                                <label for="lblClass">Class</label>
                            </div>
                            <div class="input-field col s6">
                                <input name="txtAnhoIngreso" id="lblIngreso" type="text" class="validate">
                                <label for="lblIngreso">Año de Ingreso</label>
                            </div>
                            <div class="input-field col s6">
                                <input name="txtAnhoEgreso" id="lblEgreso" type="text" class="validate">
                                <label for="lblEgreso">Año de Egreso</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea name="txtDescripcion" id="lblDescripcion" class="materialize-textarea"></textarea>
                                <label for="lblDescripcion">Descripcion</label>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit"
                                name="btnAgregarClass">Guardar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Tabla-->

        <div id="dataTable" class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <table id="example" class="display mdl-data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 350px">Class</th>
                                    <th style="width: 350px">Año Ingreso</th>
                                    <th style="width: 350px">Año Egreso</th>
                                    <th style="width: 350px">Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($class as $registro): ?>
                                <tr>
                                    <td><?php echo $registro['id_class'] ?></td>
                                    <td><?php echo $registro['anho_ingreso'] ?></td>
                                    <td><?php echo $registro['anho_egreso'] ?></td>
                                    <td><?php echo $registro['descripcion'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>