<?php

class Registro
{
    private $idR;
    private $Nombre;
    private $Email;
    private $Password;
    private $Rol;
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
        return $this->idR;
    }

    /**
     * @param mixed $idR
     */
    public function setIdR($idR)
    {
        $this->idR = $idR;
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
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->Password), PASSWORD_BCRYPT, ['cost' => 4]);;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
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

    public function Login()
    {
        $result = false;
        $email = $this->Email;
        $password = $this->Password;

        $SQL = "SELECT * FROM registro WHERE Email = '$email'";
        $Login = $this->db->query($SQL);

        if ($Login && $Login->num_rows == 1) {
            $Usuario = $Login->fetch_object();
            $Verify = password_verify($password, $Usuario->Password);
            if ($Verify) {
                $result = $Usuario;
            }
        }
        return $result;
    }

    Public function All()
    {
        $Registro = $this->db->query("SELECT * FROM registro");
        return $Registro;
    }

    Public function AllR()
    {
        $Registro = $this->db->query("SELECT COUNT(idR) AS 'Total' FROM registro ");
        return $Registro->fetch_object();
    }

    Public function Allone()
    {
        $Registro = $this->db->query("SELECT * FROM registro WHERE idR = {$this->getIdR()}");
        return $Registro->fetch_object();
    }


    public function Save()
    {
        $SQL = "INSERT INTO registro VALUES (NULL, '{$this->getNombre()}', '{$this->getEmail()}', '{$this->getPassword()}', '{$this->getRol()}');";
        $registro = $this->db->query($SQL);

        $guardado = false;

        if ($registro) {
            $guardado = true;
        }
        return $guardado;

    }

    public function Update()
    {
        $SQL = "UPDATE registro SET Nombre = '{$this->getNombre()}', Email = '{$this->getEmail()}', Rol = '{$this->getRol()}'  ";

        if ($this->getPassword() != null ) {
            $SQL .= ", Password = '{$this->getPassword()}'";
        }

        $SQL .= " WHERE idR = {$this->idR};";

        $registro = $this->db->query($SQL);

        $Editado = false;

        if ($registro) {
            $Editado = true;
        }
        return $Editado;
    }
}