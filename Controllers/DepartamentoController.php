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
}
?>