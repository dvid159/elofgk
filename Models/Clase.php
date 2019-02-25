<?php
class Clase
{
    private $id_class;
    private $anho_ingreso;
    private $anho_egreso;
    private $descripcion;

    //Get
    public function getClass()
	{
        return $this->id_class;
    }

    public function getAnhoIngreso()
	{
        return $this->anho_ingreso;
    }

    public function getAnhoEgreso()
	{
        return $this->anho_egreso;
    }

    public function getDescripcion()
	{
        return $this->descripcion;
    }

    //Set
    public function setClass($id_class)
	{
        $this->id_class=$id_class;
    }

    public function setAnhoIngreso($anho_ingreso)
	{
        $this->anho_ingreso=$anho_ingreso;
    }

    public function setAnhoEgreso($anho_egreso)
	{
        $this->anho_egreso=$anho_egreso;
    }

    public function setDescripcion($descripcion)
	{
        $this->descripcion=$descripcion;
    }
}