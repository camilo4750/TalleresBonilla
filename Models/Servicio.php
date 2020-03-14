<?php
class Servicio
{
    private $Id;
    private $Nombre;
    private $Descripcion;
    private $db;

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
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param mixed $Descripcion
     */
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }

    public function Save()
    {
        $SQL = "INSERT INTO servicio VALUES (NULL, '{$this->getNombre()}', '{$this->getDescripcion()}');";

        $Save = $this->db->query($SQL);
        $guardado = false;
        if ($Save) {
            $guardado = true;
        }

        return $guardado;
    }

    public function All()
    {
        $Servicio = $this->db->query("SELECT * FROM servicio");
        return $Servicio;
    }

    public function Allone()
    {
        $Servicio = $this->db->query("SELECT * FROM servicio WHERE Id = {$this->getId()}");
        return $Servicio->fetch_object();
    }

    public function Update()
    {
        $SQL = "UPDATE servicio SET Nombre = '{$this->getNombre()}', Descripcion = '{$this->getDescripcion()}' WHERE Id = {$this->getId()}";
        $Servicio = $this->db->query($SQL);
        $editado = false;
        if ($Servicio) {
            $editado = true;
        }

        return $editado;
    }

    public function delete()
    {
        $Sql = "DELETE FROM servicio WHERE Id = {$this->Id}";
        $delete = $this->db->query($Sql);

        $Eliminado = false;
        if ($delete) {
            $Eliminado = true;
        }
        return $Eliminado;
    }
}