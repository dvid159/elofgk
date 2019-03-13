<?php 
require_once "Models/BaseDatos.php";
require_once "Models/Alumno.php";
require_once "Models/Municipio.php";

class AlumnoController
{
    public function GetAll()
	{
		$connection = BaseDatos::instance();
		$select = $connection->prepare("SELECT * FROM alumno");
		$select->execute();
		return $select->fetchAll();
	}

	public function Agregar(Alumno $item)
	{
        $connection = BaseDatos::instance();
        
		$insert = $connection->prepare("INSERT INTO alumno (carnet_alumno, id_class, nombres, apellidos, sexo, fecha_nacimiento, foto, telefono, direccion, id_municipio, email, contrasenha, codigo_centro_educativo, turno_educativo, estado, observaciones)
         VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $class = $item->getClass();
        $municipio = $item->getMunicipio();
        $centro_escolar = $item->getCentroEscolar();
        
		$insert->execute(array(
            $item->getCarnet(),
            $class->getClass(),
            $item->getNombres(),
            $item->getApellidos(),
            $item->getSexo(),
            $item->getFechaNacimiento(),
            $item->getFoto(),
            $item->getTelefono(),
            $item->getDireccion(),
            $municipio->getIdMunicipio(),
            $item->getEmail(),
            $item->getContrasenha(),
            $centro_escolar->getCodigo(),
            $item->getTurno(),
            $item->getEstado(),
            $item->getObservaciones()
        ));
	}

	public function Eliminar($carnet){
		$connection = BaseDatos::instance();
		$eliminar = $connection->prepare("DELETE FROM alumno WHERE carnet_alumno = '$carnet'");	
		return $eliminar->execute();
	}

	public function Editar(Alumno $item){
        $connection = BaseDatos::instance();
        
		$class = $item->getClass();
        $municipio = $item->getMunicipio();
        $centro_escolar = $item->getCentroEscolar();
		
		$modificar = $connection->prepare("UPDATE alumno SET  WHERE ");
		
		return $modificar->execute([
			
        ]);
	}
}
?>