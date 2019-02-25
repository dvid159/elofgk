<?php
class Municipio
{
    private $id_municipio;
    private $departamento;
    private $municipio;
    
    //SET
    public function setIdMunicipio($id_municipio)
	{
        $this->id_municipio=$id_municipio;
    }

    public function setDepartamento(Departamento $departamento)
	{
        $this->departamento=$departamento;
    }
    
    public function setMunicipio($municipio)
	{
        $this->municipio=$municipio;
    }

    //GET
    public function getIdMunicipio()
	{
        return $this->id_municipio;
    }
    
    public function getDepartamento()
	{
        return $this->departamento;
    }
    
    public function getMunicipio()
	{
		return $this->municipio;
	}
}