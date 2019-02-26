<?php 
require_once "Models/BaseDatos.php";
require_once "Models/CentroEscolar.php";
require_once "Models/Municipio.php";

class CentroEscolarController
{
    public function GetAll()
	{
		$connection = BaseDatos::instance();
		$select = $connection->prepare("select ce.codigo_centro_educativo, ce.nombre_centro_educativo, ce.direccion, ce.telefono, d.departamento, m.municipio
        from centro_educativo ce join municipio m on (m.id_municipio = ce.id_municipio) join departamento d on (d.id_departamento = m.id_departamento)");
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
		$eliminar = $connection->prepare("DELETE FROM centro_educativo WHERE codigo_centro_educativo = '$municipio'");	
		return $eliminar->execute();
	}
}
?>