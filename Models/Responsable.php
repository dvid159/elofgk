<?php
class Responsable
{
    private $dui;
    private $alumno;
    private $tipo_responsable;
    private $ocupacion;
    private $nombres;
    private $apellidos;
    private $telefono;
    private $direccion;
    private $observaciones;

    //GET
    public function getDui()
    {
      return $this->dui;
    }

    public function getAlumno()
	{
        return $this->alumno;
    }

    public function getTipoResponsable()
	{
        return $this->tipo_responsable;
    }

    public function getOcupacion()
	{
        return $this->ocupacion;
    } 
    
    public function getNombres()
    {
      return $this->nombres;
    }

    public function getApellidos()
    {
      return $this->apellidos;
    }

    public function getTelefono()
    {
      return $this->telefono;
    }

    public function getDireccion()
    {
      return $this->direccion;
    }

    public function getObservaciones()
    {
      return $this->observaciones;
    }

    //SET
    public function setDui($dui)
    {
      $this->dui=$dui;
    }

    public function setAlumno(Alumno $alumno)
	{
        $this->alumno=$alumno;
    }

    public function setTipoResponsable(TipoResponsable $tipo_responsable)
	{
        $this->tipo_responsable=$tipo_responsable;
    }

    public function setOcupacion(Ocupacion $ocupacion)
	{
        $this->ocupacion=$ocupacion;
    } 
    
    public function setNombres($nombres)
    {
      $this->nombres=$nombres;
    }

    public function setApellidos($apellidos)
    {
      $this->apellidos=$apellidos;
    }

    public function setTelefono($telefono)
    {
      $this->telefono=$telefono;
    }

    public function setDireccion($direccion)
    {
      $this->direccion=$direccion;
    }

    public function setObservaciones($observaciones)
    {
      $this->observaciones=$observaciones;
    }
}