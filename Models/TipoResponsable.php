<?php
class TipoResponsable
{
    private $id_tipo_responsable;
    private $tipo_responsable;

    //GET
    public function getIdTipoResponsable()
    {
      return $this->id_tipo_responsable;
    }

    public function getTipoResponsable()
    {
      return $this->tipo_responsable;
    } 
    

    //SET
    public function setIdTipoResponsable($id_tipo_responsable)
    {
      $this->id_tipo_responsable=$id_tipo_responsable;
    }

    public function setTipoResponsable($tipo_responsable)
    {
      $this->tipo_responsable=$tipo_responsable;
    }    
}