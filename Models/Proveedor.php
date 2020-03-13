<?php

class Proveedor
{

    private $IdPr;
    private $Razon_Social;
    private $Nit;
    private $Representante;
    private $Telefono;
    private $Direccion;
    private $Fecha;
    private $Correo;
    private $Estado;
    private $db;

    public function __construct()
    {
        $this->db = Database::Connect();
    }

    /**
     * @return mixed
     */
    public function getIdPr()
    {
        return $this->IdPr;
    }

    /**
     * @param mixed $IdPr
     */
    public function setIdPr($IdPr)
    {
        $this->IdPr = $IdPr;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->Razon_Social;
    }

    /**
     * @param mixed $Razon_Social
     */
    public function setRazonSocial($Razon_Social)
    {
        $this->Razon_Social = $Razon_Social;
    }

    /**
     * @return mixed
     */
    public function getNit()
    {
        return $this->Nit;
    }

    /**
     * @param mixed $Nit
     */
    public function setNit($Nit)
    {
        $this->Nit = $Nit;
    }

    /**
     * @return mixed
     */
    public function getRepresentante()
    {
        return $this->Representante;
    }

    /**
     * @param mixed $Representante
     */
    public function setRepresentante($Representante)
    {
        $this->Representante = $Representante;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * @param mixed $Telefono
     */
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;
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
    public function getFecha()
    {
        return $this->Fecha;
    }

    /**
     * @param mixed $Fecha
     */
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->Correo;
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

    /**
     * @param mixed $Correo
     */


    public function setCorreo($Correo)
    {
        $this->Correo = $Correo;
    }


    public function Save()
    {
        $SQL = "INSERT INTO proveedor VALUES (NULL, '{$this->getRazonSocial()}', '{$this->getNit()}', '{$this->getRepresentante()}', '{$this->getTelefono()}', '{$this->getDireccion()}', '{$this->getCorreo()}', CURDATE(), 'Activo');";
        $save = $this->db->query($SQL);

        $guardado = false;
        if ($save) {
            $guardado = true;
        }
        return $guardado;
    }


    public function All()
    {
        $prov = $this->db->query("SELECT * FROM proveedor;");
        return $prov;
    }

    public function Allone()
    {
        $prov = $this->db->query("SELECT * FROM proveedor WHERE IdPr = '{$this->getIdPr()}'");
        return $prov->fetch_object();
    }

    public function Update()
    {
        $SQL = "UPDATE proveedor SET Razon_Social = '{$this->getRazonSocial()}', Nit = '{$this->getNit()}', Representante = '{$this->getRepresentante()}', Telefono = '{$this->getTelefono()}', Direccion = '{$this->getDireccion()}', Correo = '{$this->getCorreo()}' WHERE IdPr = {$this->getIdPr()}";
        $Proveedor = $this->db->query($SQL);

        $guardado = false;
        if ($Proveedor) {
            $guardado = true;
        }
        return $guardado;
    }

    public function EditEstado()
    {
        $Sql = "UPDATE proveedor SET Estado='{$this->getEstado()}' WHERE IdPr = {$this->getIdPr()}";
        $Proveedor = $this->db->query($Sql);

        $Guardado = false;
        if ($Proveedor) {
            $Guardado = true;
        }
        return $Guardado;
    }
}