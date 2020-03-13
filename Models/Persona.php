<?php
class Persona
{
    private $idP;
    private $Nombres;
    private $TipoDoc;
    private $Documento;
    private $Numero;
    private $Direccion;
    private $Rol;
    private $Estado;
    private $Municipio_Id;
    private $db;

    public function __construct()
    {
        $this->db = Database::Connect();
    }

    /**
     * @return mixed
     */
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * @param mixed $idP
     */
    public function setIdP($idP)
    {
        $this->idP = $idP;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->Nombres;
    }

    /**
     * @param mixed $Nombres
     */
    public function setNombres($Nombres)
    {
        $this->Nombres = $Nombres;
    }

    /**
     * @return mixed
     */
    public function getTipoDoc()
    {
        return $this->TipoDoc;
    }

    /**
     * @param mixed $TipoDoc
     */
    public function setTipoDoc($TipoDoc)
    {
        $this->TipoDoc = $TipoDoc;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * @param mixed $Documento
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->Numero;
    }

    /**
     * @param mixed $Numero
     */
    public function setNumero($Numero)
    {
        $this->Numero = $Numero;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param mixed $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->Rol;
    }

    /**
     * @param mixed $Rol
     */
    public function setRol($Rol)
    {
        $this->Rol = $Rol;
    }

    /**
     * @return mixed
     */
    public function getMunicipioId()
    {
        return $this->Municipio_Id;
    }

    /**
     * @param mixed $Municipio_Id
     */
    public function setMunicipioId($Municipio_Id)
    {
        $this->Municipio_Id = $Municipio_Id;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param mixed $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }



    public function Save()
    {
        $SQL = "INSERT INTO persona VALUES (NULL, '{$this->getNombres()}', '{$this->getTipoDoc()}', '{$this->getDocumento()}', '{$this->getNumero()}', '{$this->getDireccion()}', 'Cliente', 'Activo', {$this->getMunicipioId()});";
        $Save = $this->db->query($SQL);


        $guardado = false;

        if ($Save){
            $guardado = true;
        }
        return $guardado;
    }

    public function All()
    {
        $Persona = $this->db->query("SELECT p.*, m.Nombre AS 'Municipio' FROM persona p INNER JOIN municipio m ON p.Municipio_Id = m.Id ORDER BY idP ASC");
        return $Persona;
    }

    public function Allone()
    {
        $Persona = $this->db->query("SELECT p.*, m.Nombre AS 'Municipio' FROM persona p INNER JOIN municipio m ON p.Municipio_Id = m.Id WHERE idP = {$this->getIdP()}");
        return $Persona->fetch_object();
    }

    public function Update()
    {
        $SQL = "UPDATE persona SET Nombres = '{$this->getNombres()}', TipoDoc = '{$this->getTipoDoc()}', Documento = '{$this->getDocumento()}', Numero = '{$this->getNumero()}', Direccion = '{$this->getDireccion()}', Municipio_Id = {$this->getMunicipioId()} WHERE idP = {$this->getIdP()}";
        $Persona = $this->db->query($SQL);

        $editado = false;
        if ($Persona){
            $editado = true;
        }
        return $editado;
    }

    public function EditEstado()
    {
        $Sql = "UPDATE persona SET Estado='{$this->getEstado()}' WHERE idP = {$this->getIdP()}";
        $Persona = $this->db->query($Sql);

        $Guardado = false;
        if ($Persona) {
            $Guardado = true;
        }
        return $Guardado;
    }

    public function total()
    {
        $Persona = $this->db->query("SELECT COUNT(*) AS 'Personas' FROM persona");
        return $Persona->fetch_object();
    }
}