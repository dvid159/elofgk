<?php
class Ocupacion
{
    private $id_ocupacion;
    private $ocupacion;
    private $descripcion;

    //GET
    public function getIdOcupacion()
    {
      return $this->id_ocupacion;
    }

    public function getOcupacion()
    {
      return $this->ocupacion;
    } 
    
    public function getDescripcion()
    {
      return $this->descripcion;
    }

    //SET
    public function setIdOcupacion($id_ocupacion)
    {
      $this->id_ocupacion=$id_ocupacion;
    }

    public function setOcupacion($ocupacion)
    {
      $this->ocupacion=$ocupacion;
    }

    public function setDescripcion($descripcion)
    {
      $this->descripcion=$descripcion;
    }
    
}