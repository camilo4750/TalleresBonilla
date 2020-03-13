<?php
class Repuestos
{
    private $IdR;
    private $Repuestos;
    private $Total;
    private $Fecha;
    private $Garantia;
    private $Estado;
    private $Vehiculo_id;
    private $db;

    public function __construct()
    {
        $this->db = Database::Connect();
    }

    /**
     * @return mixed
     */
    public function getIdR()
    {
        return $this->IdR;
    }

    /**
     * @param mixed $IdR
     */
    public function setIdR($IdR)
    {
        $this->IdR = $IdR;
    }

    /**
     * @return mixed
     */
    public function getRepuestos()
    {
        return $this->Repuestos;
    }

    /**
     * @param mixed $Repuestos
     */
    public function setRepuestos($Repuestos)
    {
        $this->Repuestos = $Repuestos;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->Total;
    }

    /**
     * @param mixed $Total
     */
    public function setTotal($Total)
    {
        $this->Total = $Total;
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
    public function getGarantia()
    {
        return $this->Garantia;
    }

    /**
     * @param mixed $Garantia
     */
    public function setGarantia($Garantia)
    {
        $this->Garantia = $Garantia;
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
     * @return mixed
     */
    public function getVehiculoId()
    {
        return $this->Vehiculo_id;
    }

    /**
     * @param mixed $Vehiculo_id
     */
    public function setVehiculoId($Vehiculo_id)
    {
        $this->Vehiculo_id = $Vehiculo_id;
    }

    public function Save()
    {
        $SQL = "INSERT INTO repuestos VALUES (NULL, '{$this->getRepuestos()}', {$this->getTotal()}, '{$this->getFecha()}', '{$this->getGarantia()}', 'Activo', {$this->getVehiculoId()});";
        $Save = $this->db->query($SQL);

        $guardado = false;
        if ($Save) {
            $guardado = true;
        }

        return $guardado;
    }

    Public function All()
    {
        $Repuestos = $this->db->query("SELECT r.*, v.Placa AS 'Placa' FROM Repuestos r INNER JOIN vehiculo v ON r.Vehiculo_id = v.id ORDER BY IdR ASC");
        return $Repuestos;
    }

    Public function Allone()
    {
        $Repuestos = $this->db->query("SELECT r.*, v.Placa AS 'Placa' FROM Repuestos r INNER JOIN vehiculo v ON r.Vehiculo_id = v.id WHERE IdR = {$this->getIdR()}");
        return $Repuestos->fetch_object();
    }

    public function Update()
    {
        $SQL = "UPDATE repuestos SET Repuestos = '{$this->getRepuestos()}', Total = {$this->getTotal()}, Fecha = '{$this->getFecha()}', Garantia = '{$this->getGarantia()}', Vehiculo_id = {$this->getVehiculoId()} WHERE IdR = {$this->getIdR()}";
        $Editado = $this->db->query($SQL);

        $editado = false;
        if ($Editado){
            $editado = true;
        }
        return $editado;
    }

    public function EditEstado()
    {
        $Sql = "UPDATE repuestos SET Estado='{$this->getEstado()}' WHERE IdR = {$this->getIdR()}";
        $Repuestos = $this->db->query($Sql);

        $Guardado = false;
        if ($Repuestos) {
            $Guardado = true;
        }
        return $Guardado;
    }

    public function total()
    {
        $Persona = $this->db->query("SELECT COUNT(*) AS 'Repuestos' FROM repuestos");
        return $Persona->fetch_object();
    }
}