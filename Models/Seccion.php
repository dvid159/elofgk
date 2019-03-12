<?php
class Seccion
{
    private $id_seccion;
    private $class;
    private $anho;
    private $descripcion;

    //GET
    public function getSeccion()
	{
        return $this->id_seccion;
    }

    public function getClass()
	{
        return $this->class;
    }

    public function getAnho()
	{
        return $this->anho;
    }

    public function getDescripcion()
	{
        return $this->descripcion;
    }

    //SET
    public function setSeccion($id_seccion)
	{
        $this->id_seccion=$id_seccion;
    }

    public function setClass(Clase $class)
	{
        $this->class=$class;
    }

    public function setAnho($anho)
	{
        $this->anho=$anho;
    }

    public function setDescripcion($descripcion)
	{
        $this->descripcion=$descripcion;
    }
}
