<?php
class Cargo
{
    private $id_cargo;
    private $cargo;
    private $descripcion;

    //GET
    public function getIdCargo()
    {
      return $this->id_cargo;
    }
      
    public function getCargo()
    {
      return $this->cargo;
    }

    public function getDescripcion()
    {
      return $this->descripcion;
    }

    //SET
    public function setIdCargo($id_cargo)
    {
      $this->id_cargo=$id_cargo;
    }

    public function setCargo($cargo)
    {
      $this->cargo=$cargo;
    } 
    
    public function setDescripcion($descripcion)
    {
      $this->descripcion=$descripcion;
    }
    
}