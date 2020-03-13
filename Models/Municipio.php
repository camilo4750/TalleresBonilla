<?php
class Municipio
{
    private $Id ;
    private $Codigo ;
    private $Nombre ;
    private $Departamento_Id ;
    private $db ;

    public function __construct()
    {
        $this->db = Database::Connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->Codigo;
    }

    /**
     * @param mixed $Codigo
     */
    public function setCodigo($Codigo)
    {
        $this->Codigo = $Codigo;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param mixed $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return mixed
     */
    public function getDepartamentoId()
    {
        return $this->Departamento_Id;
    }

    /**
     * @param mixed $Departamento_Id
     */
    public function setDepartamentoId($Departamento_Id)
    {
        $this->Departamento_Id = $Departamento_Id;
    }

    public function All()
    {
       $municipio = $this->db->query("SELECT * FROM municipio");
       return $municipio;

    }
}