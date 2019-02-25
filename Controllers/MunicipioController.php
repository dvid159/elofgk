<?php 
require_once "Models/BaseDatos.php";
require_once "Models/Municipio.php";
require_once "Models/Departamento.php";

class MunicipioController
{
    public function GetAll()
	{
		$connection = BaseDatos::instance();
		$select = $connection->prepare("select m.id_municipio, d.departamento, m.municipio from municipio m join departamento d on (d.id_departamento=m.id_departamento)");
		$select->execute();
		return $select->fetchAll();
	}

	public function Agregar(Municipio $item)
	{
		$connection = BaseDatos::instance();
		$insert = $connection->prepare("INSERT INTO municipio (id_departamento, municipio) VALUES(?,?)");
		$departamento = $item->getDepartamento();
		$insert->execute(array($departamento->getIdDepartamento(), $item->getMunicipio()));
	}

	public function Eliminar($municipio){
		$connection = BaseDatos::instance();
		$eliminar = $connection->prepare("DELETE FROM municipio WHERE id_municipio = '$municipio'");	
		return $eliminar->execute();
	}
}
?>