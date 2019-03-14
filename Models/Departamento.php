<?php
class Departamento
{
    private $id_departamento;
    private $departamento;

    //GET
    public function getIdDepartamento()
    {
      return $this->id_departamento;
    }
      
    public function getDepartamento()
    {
      return $this->departamento;
    }

    //SET
    public function setIdDepartamento($id_departamento)
    {
      $this->id_departamento=$id_departamento;
    }

    public function setDepartamento($departamento)
    {
      $this->departamento=$departamento;
    }     
    
}