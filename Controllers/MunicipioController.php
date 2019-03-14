<?php 
require_once "config/BaseDatos.php";
require_once "Models/Municipio.php";
require_once "Models/Departamento.php";

class MunicipioController
{
    public function GetAll()
	{
		$connection = BaseDatos::instance();
		$select = $connection->prepare("SELECT m.id_municipio, d.departamento, m.municipio FROM municipio m JOIN departamento d ON (d.id_departamento=m.id_departamento)");
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

	public function Editar(Municipio $item){
		$connection = BaseDatos::instance();
		$departamento = $item->getDepartamento();
		$modificar = $connection->prepare("UPDATE municipio SET municipio=?, id_departamento=? WHERE id_municipio=?");
		return $modificar->execute([
			$item->getmunicipio(), 
			$departamento->getIdDepartamento(), 
			$item->getIdmunicipio()
		]);
	}
}
?>