<?php 
require_once "config/BaseDatos.php";
require_once "Models/CentroEscolar.php";
require_once "Models/Municipio.php";

class CentroEscolarController
{
    public function GetAll()
	{
		$connection = BaseDatos::instance();
		$select = $connection->prepare("SELECT ce.codigo_centro_educativo, ce.nombre_centro_educativo, ce.direccion, ce.telefono, d.departamento, m.municipio
        FROM centro_educativo ce JOIN municipio m ON (m.id_municipio = ce.id_municipio) JOIN departamento d ON (d.id_departamento = m.id_departamento)");
		$select->execute();
		return $select->fetchAll();
	}

	public function Agregar(CentroEscolar $item)
	{
		$connection = BaseDatos::instance();
		$insert = $connection->prepare("INSERT INTO centro_educativo (codigo_centro_educativo, nombre_centro_educativo, direccion, telefono, id_municipio, descripcion) VALUES(?,?,?,?,?,?)");
        $municipio = $item->getMunicipio();
        
		$insert->execute(array(
            $item->getCodigo(),
            $item->getNombre(),
            $item->getDireccion(),
            $item->getTelefono(),
            $municipio->getIdMunicipio(), 
            $item->getDescripcion()
        ));
	}

	public function Eliminar($codigo){
		$connection = BaseDatos::instance();
		$eliminar = $connection->prepare("DELETE FROM centro_educativo WHERE codigo_centro_educativo = '$codigo'");	
		return $eliminar->execute();
	}

	public function Editar(CentroEscolar $item){
		$connection = BaseDatos::instance();
		$municipio = $item->getMunicipio();
		
		$modificar = $connection->prepare("UPDATE centro_educativo SET nombre_centro_educativo=?, 
		direccion=?, telefono=?, id_municipio=?, descripcion=? WHERE codigo_centro_educativo=?");
		
		return $modificar->execute([
			$item->getNombre(), 
			$item->getDireccion(),
			$item->getTelefono(),
			$municipio->getIdMunicipio(), 
			$item->getDescripcion(),
			$item->getCodigo()
		]);
	}
}
?>