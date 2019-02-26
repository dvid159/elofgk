<?php
require_once "Controllers/CentroEscolarController.php";
require_once "Models/CentroEscolar.php";

require_once "Controllers/MunicipioController.php";
require_once "Models/Municipio.php";

$centroEducativoController = new CentroEscolarController();
$centrosEducativos = $centroEducativoController->GetAll();

$MunicipiosController = new MunicipioController();
$municipios = $MunicipiosController->GetAll();

//Para Agregar Centro Educativo
if(isset($_POST['btnAgregarCentroEscolar']))
{
    $new_CentroEscolar = new CentroEscolar();
    $mun = new Municipio();

    foreach ($municipios as $item ) 
    {        
        if ($item['id_municipio'] == $_POST['cbmMunicipio']) {
          $mun->setIdMunicipio($item['id_municipio']);
        }
    }
    $new_CentroEscolar->setMunicipio($mun);
    $new_CentroEscolar->setCodigo($_POST['txtCodigo']);
    $new_CentroEscolar->setNombre($_POST['txtNombre']);
    $new_CentroEscolar->setDireccion($_POST['txtDireccion']);
    $new_CentroEscolar->setTelefono($_POST['txtTelefono']);
    $new_CentroEscolar->setDescripcion($_POST['txtDescripcion']);
    $centroEducativoController->Agregar($new_CentroEscolar);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
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

    <title>Centro Educativo</title>
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
                        <p>Centros Educativos</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Boton agregar-->
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large btn modal-trigger waves-effect waves-light red" href="#AddCentroEscolar"><i
                    class=" material-icons">add</i></a>
        </div>

        <!--Modal Agregar-->
        <div id="AddCentroEscolar" class="modal" tabindex="-1">
            <div class="modal-content">
                <h4>Nuevo Centro Educativo</h4>
                <div class="row">
                    <form class="col s12" role="form" action="CentroEducativos.php" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="txtCodigo" value="" id="lblCodigo" type="text" class="validate">
                                <label for="lblCodigo">Codigo</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txtNombre" value="" id="lblNombre" type="text" class="validate">
                                <label for="lblNombre">Nombre</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txtDireccion" value="" id="lblDireccion" type="text" class="validate">
                                <label for="lblDireccion">Direccion</label>
                            </div>
                            <div class="input-field col s6">
                                <input name="txtTelefono" id="lblTelefono" type="text" class="validate">
                                <label for="lblTelefono">Telefono</label>
                            </div>
                            <div class="input-field col s6">
                                <select name="cbmMunicipio" class="browser-default">
                                    <option value="" disabled selected>Seleccione Municipio</option>
                                    <?php foreach($municipios as $registro): ?>
                                    <option value="<?php echo $registro['id_municipio'] ?>">
                                        <?php echo $registro['municipio']?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-field col s12">
                                <textarea name="txtDescripcion" id="lblDescripcion"
                                    class="materialize-textarea"></textarea>
                                <label for="lblDescripcion">Descripcion</label>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit"
                                name="btnAgregarCentroEscolar">Guardar
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
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($centrosEducativos as $registro): ?>
                                <tr>
                                    <td><?php echo $registro['codigo_centro_educativo']; ?></td>
                                    <td><?php echo $registro['nombre_centro_educativo']; ?></td>
                                    <td><?php echo $registro['direccion']; ?></td>
                                    <td><?php echo $registro['telefono']; ?></td>
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