<?php 
require_once "Models/BaseDatos.php";
require_once "Models/Departamento.php";

class DepartamentoController
{
    public function GetAll()
	{
		$connection = BaseDatos::instance();
		$select = $connection->prepare("SELECT * FROM departamento order by departamento asc");
		$select->execute();
		return $select->fetchAll();
	}

	public function Agregar(Departamento $item)
	{
		$connection = BaseDatos::instance();
		$insert = $connection->prepare("INSERT INTO departamento (departamento) VALUES(?)");
		$insert->execute(array($item->getDepartamento()));
	}

	public function Eliminar($departamento){
		$connection = BaseDatos::instance();
		$eliminar = $connection->prepare("DELETE FROM departamento WHERE id_departamento = '$departamento'");	
		return $eliminar->execute();
	}

	public function Editar(Departamento $departamento){
		$connection = BaseDatos::instance();
		$modificar = $connection->prepare("UPDATE departamento SET departamento=? WHERE id_departamento=?");
		return $modificar->execute([$departamento->getDepartamento(), $departamento->getIdDepartamento()]);
	}
}
?>