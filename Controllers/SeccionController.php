<?php 
require_once "config/BaseDatos.php";
require_once "Models/Clase.php";
require_once "Models/Seccion.php";

class SeccionController
{
    public function GetAll()
	{
		$connection = BaseDatos::instance();
		$select = $connection->prepare("SELECT * FROM seccion");
		$select->execute();
		return $select->fetchAll();
	}

	public function Agregar(Seccion $item)
	{
		$connection = BaseDatos::instance();
		$insert = $connection->prepare("INSERT INTO seccion (id_seccion, id_class, anho, descripcion) VALUES(?,?,?,?)");
		$class = $item->getClass();
		$insert->execute(array(
            $item->getSeccion(), 
            $class->getClass(),
            $item->getAnho(),
            $item->getDescripcion()
        ));
	}

	public function Eliminar($seccion){
		$connection = BaseDatos::instance();
		$eliminar = $connection->prepare("DELETE FROM seccion WHERE id_seccion = '$seccion'");	
		return $eliminar->execute();
	}

	public function Editar(Seccion $item){
		$connection = BaseDatos::instance();
		$class = $item->getClass();
		$modificar = $connection->prepare("UPDATE seccion SET id_class=?, anho=?, descripcion=? WHERE id_seccion=?");
		return $modificar->execute([
            $class->getClass(), 
            $item->getAnho(), 
            $item->getDescripcion(),
            $item->getSeccion()
        ]);
	}
}
?>