<?php
require_once "Controllers/DepartamentoController.php";
require_once "Models/Departamento.php";

require_once "Controllers/MunicipioController.php";
require_once "Models/Municipio.php";

$DetartamentosController = new DepartamentoController();
$departamentos = $DetartamentosController->GetAll();

$MunicipiosController = new MunicipioController();
$municipios = $MunicipiosController->GetAll();

//Para Agregar Municipio
if(isset($_POST['bntAgregarMunicipio']))
{
    $new_municipio = new Municipio();
    $dep = new Departamento();

    foreach ($departamentos as $item ) 
    {        
        if ($item['id_departamento'] == $_POST['cbxDepartamento']) {
          $dep->setIdDepartamento($item['id_departamento']);
        }
    }
    $new_municipio->setDepartamento($dep);
    $new_municipio->setMunicipio($_POST['txtMunicipio']);
    $MunicipiosController->Agregar($new_municipio);
}

//Para Eliminar
if(isset($_GET['action'])){
    if(isset($_GET['id_municipio'])){
        $id_municipio = $_GET['id_municipio'];
        $municipios = $MunicipiosController->Eliminar($id_municipio);
        $municipios = $MunicipiosController->GetAll();
    }
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

    <title>Municipios</title>
</head>

<body>

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
        <div id="header" class="row z-depth-3">
            <div class="col s12">
                <div class="teal card-panel">
                    <div class="title">
                        <p>Municipios</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Boton agregar-->
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large btn modal-trigger waves-effect waves-light red" href="#AddMunicipio"><i
                    class=" material-icons">add</i></a>
        </div>

        <!--Modal Agregar-->
        <div id="AddMunicipio" class="modal">
            <div class="modal-content">
                <h4>Agregar Municipio</h4>
                <div class="row">
                    <form class="col s12" role="form" action="Municipios.php" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="lblMunicipio" type="text" class="validate" name="txtMunicipio">
                                <label for="lblMunicipio">Municipio</label>
                            </div>
                            <div class="input-field col s12">
                                <select id="cmb" name="cbxDepartamento">
                                    <option>
                                        Seleccione Departamento
                                    </option>
                                    <?php foreach($departamentos as $registro): ?>
                                    <option value="<?php echo $registro['id_departamento'] ?>">
                                        <?php echo $registro['departamento']?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <label>Departamento</label>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit"
                                name="bntAgregarMunicipio">Guardar
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
                                    <th style="width: 350px">Departamento</th>
                                    <th style="width: 350px">Municipio</th>
                                    <th style="width: 300px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($municipios as $registro): ?>
                                <tr>
                                    <td><?php echo $registro['departamento']; ?></td>
                                    <td><?php echo $registro['municipio']; ?></td>
                                    <td><a class="waves-effect waves-light btn-small red"
                                            href="Municipios.php?action=delete&id_municipio=<?php echo $registro['id_municipio'] ?>">Eliminar</a>
                                    </td>
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