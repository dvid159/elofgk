<?php
class CentroEscolar
{
    private $codigo_centro_educativo;
    private $nombre_centro_educativo;
    private $direccion;
    private $telefono;   
    private $municipio;
    private $descripcion;

    //GET
    public function getCodigo()
    {
      return $this->codigo_centro_educativo;
    }

    public function getNombre()
    {
      return $this->nombre_centro_educativo;
    }

    public function getDireccion()
    {
      return $this->direccion;
    }

    public function getTelefono()
    {
      return $this->telefono;
    }

    public function getMunicipio()
	{
        return $this->municipio;
    }

    public function getDescripcion()
	{
        return $this->descripcion;
    }

    //SET
    public function setCodigo($codigo_centro_educativo)
	{
        $this->codigo_centro_educativo=$codigo_centro_educativo;
    }

    public function setNombre($nombre_centro_educativo)
	{
        $this->nombre_centro_educativo=$nombre_centro_educativo;
    }

    public function setDireccion($direccion)
	{
        $this->direccion=$direccion;
    }

    public function setTelefono($telefono)
	{
        $this->telefono=$telefono;
    }

    public function setMunicipio(Municipio $municipio)
	{
        $this->municipio=$municipio;
    }

    public function setDescripcion($descripcion)
	{
        $this->descripcion=$descripcion;
    }
}