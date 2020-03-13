<?php
require_once 'Models/Marca.php';
class Marca
{
    private $idMarca ;
    private $Nombre ;
    private $db ;

    public function __construct()
    {
        $this->db = Database::Connect();
    }

    /**
     * @return mixed
     */
    public function getIdMarca()
    {
        return $this->idMarca;
    }

    /**
     * @param mixed $idMarca
     */
    public function setIdMarca($idMarca)
    {
        $this->idMarca = $idMarca;
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

    public function Save()
    {
        $SQL = "INSERT INTO marca VALUES (NULL, '{$this->getNombre()}');";
        $Save = $this->db->query($SQL);
        $guardado = false;
        if ($Save){
            $guardado = true;
        }
        return $guardado;
    }

    public function All()
    {
        $Marca = $this->db->query("SELECT * FROM marca");
        return $Marca;
    }


    public function Allone()
    {
        $Marca = $this->db->query("SELECT * FROM marca WHERE idMarca = {$this->getIdMarca()}");
        return $Marca->fetch_object();
    }

    public function Update()
    {
        $SQL = "UPDATE marca SET Nombre = '{$this->getNombre()}' WHERE idMarca = {$this->getIdMarca()}";
        $Marca = $this->db->query($SQL);

        $guardado = false;
        if ($Marca) {
            $guardado = true;
        }
        return $guardado;
    }
}