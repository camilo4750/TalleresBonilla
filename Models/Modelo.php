<?php
class Modelo
{
    private $IdM ;
    private $Modelo ;
    private $db ;

    public function __construct()
    {
        $this->db = Database::Connect();
    }

    /**
     * @return mixed
     */
    public function getIdM()
    {
        return $this->IdM;
    }

    /**
     * @param mixed $IdM
     */
    public function setIdM($IdM)
    {
        $this->IdM = $IdM;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->Modelo;
    }

    /**
     * @param mixed $Modelo
     */
    public function setModelo($Modelo)
    {
        $this->Modelo = $Modelo;
    }


    public function Save()
    {
        $SQL = "INSERT INTO modelo VALUES (NULL, '{$this->getModelo()}');";
        $Save = $this->db->query($SQL);
        $guardado = false;
        if ($Save){
            $guardado = true;
        }
        return $guardado;
    }

    public function All()
    {
        $Modelo = $this->db->query("SELECT * FROM modelo");
        return $Modelo;
    }

    public function Allone()
    {
        $Modelo = $this->db->query("SELECT * FROM modelo WHERE IdM = {$this->getIdM()}");
        return $Modelo->fetch_object();
    }

    public function Update()
    {
        $SQL = "UPDATE modelo SET Modelo = '{$this->getModelo()}' WHERE IdM = {$this->getIdM()}";
        $Modelo = $this->db->query($SQL);

        $guardado = false;
        if ($Modelo) {
            $guardado = true;
        }
        return $guardado;
    }
}