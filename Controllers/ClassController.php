<?php 
require_once "Models/BaseDatos.php";
require_once "Models/Clase.php";

class ClassController
{
    public function GetAll()
	{
		$connection = BaseDatos::instance();
		$select = $connection->prepare("SELECT * FROM class order by anho_egreso desc");
		$select->execute();
		return $select->fetchAll();
	}

    
    public function Agregar(Clase $item)
	{
		$connection = BaseDatos::instance();
		$insert = $connection->prepare("INSERT INTO class (id_class, anho_ingreso, anho_egreso, descripcion) VALUES(?,?,?,?)");
		$insert->execute(array(
            $item->getClass(),
            $item->getAnhoIngreso(),
            $item->getAnhoEgreso(),
            $item->getDescripcion()
        ));
	}
	
	public function Eliminar($id_class){
		$connection = BaseDatos::instance();
		$eliminar = $connection->prepare("DELETE FROM class WHERE id_class = '$id_class'");	
		return $eliminar->execute();
	}
}
?>