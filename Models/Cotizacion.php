<?php
class Cotizacion
{
    private $IdC;
    private $N_Serial;
    private $Labor;
    private $Fecha;
    private $Fecha_Fin;
    private $Abono;
    private $Servicio_Id;
    private $Persona_idP;
    private $Repuestos_IdR;
    private $Vehiculo_ids;
    private $db;

    public function __construct()
    {
        $this->db = Database::Connect();
    }

    /**
     * @return mixed
     */
    public function getIdC()
    {
        return $this->IdC;
    }

    /**
     * @param mixed $IdC
     */
    public function setIdC($IdC)
    {
        $this->IdC = $IdC;
    }

    /**
     * @return mixed
     */
    public function getNSerial()
    {
        return $this->N_Serial;
    }

    /**
     * @param mixed $N_Serial
     */
    public function setNSerial($N_Serial)
    {
        $this->N_Serial = $N_Serial;
    }

    /**
     * @return mixed
     */
    public function getLabor()
    {
        return $this->Labor;
    }

    /**
     * @param mixed $Labor
     */
    public function setLabor($Labor)
    {
        $this->Labor = $Labor;
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
    public function getFechaFin()
    {
        return $this->Fecha_Fin;
    }

    /**
     * @param mixed $Fecha_Fin
     */
    public function setFechaFin($Fecha_Fin)
    {
        $this->Fecha_Fin = $Fecha_Fin;
    }

    /**
     * @return mixed
     */
    public function getAbono()
    {
        return $this->Abono;
    }

    /**
     * @param mixed $Abono
     */
    public function setAbono($Abono)
    {
        $this->Abono = $Abono;
    }

    /**
     * @return mixed
     */
    public function getServicioId()
    {
        return $this->Servicio_Id;
    }

    /**
     * @param mixed $Servicio_Id
     */
    public function setServicioId($Servicio_Id)
    {
        $this->Servicio_Id = $Servicio_Id;
    }

    /**
     * @return mixed
     */
    public function getPersonaIdP()
    {
        return $this->Persona_idP;
    }

    /**
     * @param mixed $Persona_idP
     */
    public function setPersonaIdP($Persona_idP)
    {
        $this->Persona_idP = $Persona_idP;
    }

    /**
     * @return mixed
     */
    public function getRepuestosIdR()
    {
        return $this->Repuestos_IdR;
    }

    /**
     * @param mixed $Repuestos_IdR
     */
    public function setRepuestosIdR($Repuestos_IdR)
    {
        $this->Repuestos_IdR = $Repuestos_IdR;
    }

    /**
     * @return mixed
     */
    public function getVehiculoIds()
    {
        return $this->Vehiculo_ids;
    }

    /**
     * @param mixed $Vehiculo_ids
     */
    public function setVehiculoIds($Vehiculo_ids)
    {
        $this->Vehiculo_ids = $Vehiculo_ids;
    }

    public function Save()
    {
        $SQL = "INSERT INTO cotizacion VALUES (NULL, '{$this->getNSerial()}', '{$this->getLabor()}', '{$this->getFecha()}', '{$this->getFechaFin()}', {$this->getAbono()}, {$this->getServicioId()}, {$this->getPersonaIdP()}, {$this->getRepuestosIdR()}, {$this->getVehiculoIds()});";
        $Save = $this->db->query($SQL);

        $guardado = false;
        if ($Save) {
            $guardado = true;
        }
        return $guardado;
    }

    public function All()
    {
        $Cotizacion = $this->db->query("SELECT  c.*, s.Nombre AS 'Servicio', p.Nombres AS 'Persona', r.Repuestos AS 'Repuestos', v.Placa AS 'Placa' FROM cotizacion c INNER JOIN servicio s ON c.Servicio_Id = s.Id INNER JOIN persona p ON c.Persona_idP = p.idP INNER JOIN repuestos r ON c.Repuestos_IdR = r.IdR INNER JOIN vehiculo v ON c.Vehiculo_id = v.id ORDER BY c.IdC");
        return $Cotizacion;
    }

    public function Allone()
    {
        $Cotizacion = $this->db->query("SELECT c.*, s.Nombre AS 'Servicio', p.Nombres AS 'Persona', r.Repuestos AS 'Repuestos', v.Placa AS 'Placa' FROM cotizacion c INNER JOIN servicio s ON c.Servicio_Id = s.Id INNER JOIN persona p ON c.Persona_idP = p.idP INNER JOIN repuestos r ON c.Repuestos_IdR = r.IdR INNER JOIN vehiculo v ON c.Vehiculo_id = v.id WHERE IdC = {$this->getIdC()}");
        return $Cotizacion->fetch_object();
    }

    public function Update()
    {
        $SQL = "UPDATE cotizacion SET N_Serial = '{$this->getNSerial()}', Labor = '{$this->getLabor()}', Fecha = '{$this->getFecha()}', Fecha_Fin = '{$this->getFechaFin()}', Abono = {$this->getAbono()}, Servicio_Id = {$this->getServicioId()}, Persona_idP = {$this->getPersonaIdP()}, Repuestos_IdR = {$this->getRepuestosIdR()}, Vehiculo_id = {$this->getVehiculoIds()} WHERE IdC = {$this->getIdC()}";
        $Cotizacion = $this->db->query($SQL);

        $editado = false;
        if ($Cotizacion) {
            $editado = true;
        }
        return $editado;
    }

    public function total()
    {
        $Persona = $this->db->query("SELECT COUNT(*) AS 'Cotizaciones' FROM cotizacion");
        return $Persona->fetch_object();
    }
}