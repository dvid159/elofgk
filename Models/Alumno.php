<?php
class Alumno
{
    private $carnet_alumno;
    private $class;
    private $nombres;
    private $apellidos;
    private $sexo;
    private $fecha_nacimiento;
    private $direccion;
    private $foto;
    private $municipio;
    private $telefono;
    private $email;
    private $contrasenha;
    private $codigo_centro_educativo;
    private $turno_educativo;
    private $estado;
    private $observaciones;

    //GET
    public function getCarnet()
	{
        return $this->carnet_alumno;
    }

    public function getClass()
	{
        return $this->class;
    }

    public function getNombres()
	{
        return $this->nombres;
    }

    public function getApellidos()
	{
        return $this->apellidos;
    }

    public function getSexo()
	{
        return $this->sexo;
    }

    public function getFechaNacimiento()
	{
        return $this->fecha_nacimiento;
    }

    public function getDireccion()
	{
        return $this->direccion;
    }

    public function getFoto()
	{
        return $this->foto;
    }

    public function getMunicipio()
	{
        return $this->municipio;
    }

    public function getTelefono()
	{
        return $this->telefono;
    }

    public function getEmail()
	{
        return $this->email;
    }

    public function getContrasenha()
	{
        return $this->contrasenha;
    }

    public function getCentroEscolar()
	{
        return $this->codigo_centro_educativo;
    }

    public function getTurno()
	{
        return $this->turno_educativo;
    }

    public function getEstado()
	{
        return $this->estado;
    }

    public function getObservaciones()
	{
        return $this->observaciones;
    }

    //SET
    public function setSeccion($carnet_alumno)
	{
        $this->carnet_alumno=$carnet_alumno;
    }

    public function setClass(Clase $class)
	{
        $this->class=$class;
    }

    public function setNombres($nombres)
	{
        $this->nombres=$nombres;
    }

    public function setApellido($apellidos)
	{
        $this->apellidos=$apellidos;
    }

    public function setSexo($sexo)
	{
        $this->sexo=$sexo;
    }

    public function setFechaNacimiento($fecha_nacimiento)
	{
        $this->fecha_nacimiento=$fecha_nacimiento;
    }

    public function setDireccion($direccion)
	{
        $this->direccion=$direccion;
    }

    public function setFoto($foto)
	{
        $this->foto=$foto;
    }

    public function setMunicipio(Municipio $municipio)
	{
        $this->municipio=$municipio;
    }

    public function setTelefono($telefono)
	{
        $this->telefono=$telefono;
    }

    public function setEmail($email)
	{
        $this->email=$email;
    }

    public function setContrasenha($contrasenha)
	{
        $this->contrasenha=$contrasenha;
    }

    public function setCentroEscolar(CentroEscolar $codigo_Centro_Educativo)
	{
        $this->codigo_Centro_Educativo=$codigo_Centro_Educativo;
    }

    public function setTurno($turno_educativo)
	{
        $this->turno_educativo=$turno_educativo;
    }

    public function setEstado($estado)
	{
        $this->estado=$estado;
    }

    public function setObservaciones($observaciones)
	{
        $this->observaciones=$observaciones;
    }
}