<?php
require_once "Controllers/DepartamentoController.php";
require_once "Models/Departamento.php";

$DetartamentosController = new DepartamentoController();
$departamentos = $DetartamentosController->GetAll();

//Para Agregar Departamento
if (isset($_POST['bntAgregarDepartamento']))
{
    $new_departamento = new Departamento();
    $new_departamento->setDepartamento($_POST['txtDepartamento']);
    $DetartamentosController->Agregar($new_departamento);
}

//Para Eliminar
if(isset($_GET['action'])){
    if(isset($_GET['id_departamento'])){
        $id_departamento = $_GET['id_departamento'];
        $departamentos = $DetartamentosController->Eliminar($id_departamento);
        $departamentos = $DetartamentosController->GetAll();
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

    <title>Document</title>
</head>
<body>
<div id="dataTable" class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <table id="example" class="mdl-data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 75px">N°</th>
                                    <th style="width: 450px">Departamento</th>
                                    <th style="width: 170px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($departamentos as $registro): ?>
                                <tr>
                                    <td><input type="text" value="<?php echo $registro['id_departamento'] ?>"></td>
                                    <td><?php echo $registro['departamento'] ?></td>
                                    <td>
                                    <a class="waves-effect waves-light btn-small"><i
                                                class="material-icons">edit</i></a>
                                    <a class="waves-effect waves-light btn-small red"
                                            href="Departamentos.php?action=delete&id_departamento=<?php echo $registro['id_departamento'] ?>"><i
                                                class="material-icons">delete</i></a></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>