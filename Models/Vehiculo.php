<?php
class Vehiculo
{

    private $id;
    private $Placa;
    private $Color;
    private $Modelo_IdM;
    private $Marca_idMarca;
    private $Persona_idP;
    private $Estado;
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
        return $this->id;
    }

    /**
     * @param mixed $idV
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->Placa;
    }

    /**
     * @param mixed $Placa
     */
    public function setPlaca($Placa)
    {
        $this->Placa = $Placa;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->Color;
    }

    /**
     * @param mixed $Color
     */
    public function setColor($Color)
    {
        $this->Color = $Color;
    }

    /**
     * @return mixed
     */
    public function getModeloIdM()
    {
        return $this->Modelo_IdM;
    }

    /**
     * @param mixed $Modelo_IdM
     */
    public function setModeloId($Modelo_IdM)
    {
        $this->Modelo_IdM = $Modelo_IdM;
    }

    /**
     * @return mixed
     */
    public function getMarcaIdMarca()
    {
        return $this->Marca_idMarca;
    }

    /**
     * @param mixed $Marca_idMarca
     */
    public function setMarcaIdMarca($Marca_idMarca)
    {
        $this->Marca_idMarca = $Marca_idMarca;
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
        $SQL = "INSERT INTO vehiculo VALUES (NULL, '{$this->getPlaca()}', '{$this->getColor()}', {$this->getModeloIdM()}, {$this->getMarcaIdMarca()}, {$this->getPersonaIdP()}, CURTIME(), 'Activo')";
        $Save = $this->db->query($SQL);
        $guardado = false;
        if ($Save){
            $guardado = true;
        }
        return $guardado;
    }

    public function All()
    {
        $Repuesto = $this->db->query("SELECT v.*, m.Modelo AS 'Modelo', c.Nombre AS 'Marca', p.Nombres AS 'Persona' FROM vehiculo v INNER JOIN modelo m ON v.Modelo_IdM = m.IdM INNER JOIN marca c ON v.Marca_idMarca = c.idMarca INNER JOIN persona p ON v.Persona_idP = p.idP ORDER BY v.id ASC");
        return $Repuesto;
    }

    public function Update()
    {
        $SQL = "UPDATE vehiculo SET Placa = '{$this->getPlaca()}', Color = '{$this->getColor()}', Modelo_IdM = {$this->getModeloIdM()}, Marca_idMarca = {$this->getMarcaIdMarca()}, Persona_idP = {$this->getPersonaIdP()}, Fecha = CURTIME() WHERE id = {$this->getId()}";
        $Edit = $this->db->query($SQL);

        $editado = false;
        if ($Edit){
            $editado = true;
        }
        return $editado;
    }

    public function Allone()
    {
        $Persona = $this->db->query("SELECT v.*, m.Modelo AS 'Modelo', c.Nombre AS 'Marca', p.Nombres AS 'Persona' FROM vehiculo v INNER JOIN modelo m ON v.Modelo_IdM = m.IdM INNER JOIN marca c ON v.Marca_idMarca = c.idMarca INNER JOIN persona p ON v.Persona_idP = p.idP WHERE id = {$this->getId()}");
        return $Persona->fetch_object();
    }

    public function EditEstado()
    {
        $Sql = "UPDATE vehiculo SET Estado='{$this->getEstado()}' WHERE id = {$this->getId()}";
        $Vehiculo = $this->db->query($Sql);

        $Guardado = false;
        if ($Vehiculo) {
            $Guardado = true;
        }
        return $Guardado;
    }

    public function total()
    {
        $Persona = $this->db->query("SELECT COUNT(*) AS 'Vehiculos' FROM vehiculo");
        return $Persona->fetch_object();
    }
}