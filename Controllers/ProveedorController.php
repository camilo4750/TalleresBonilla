<?php
require_once 'Models/Proveedor.php';

class ProveedorController
{

    public function crear()
    {
        if (isset($_SESSION['Administrador'])){
            Utilidades::isAdmin();
        }elseif (isset($_SESSION['Usuario'])){
            Utilidades::isUsuario();
        }

        if (isset($_GET['id'])) {
            $Editar = true;
            $id = $_GET['id'];
            $proveedor = new Proveedor();
            $proveedor->setIdPr($id);
            $Proveedor = $proveedor->Allone();

        }
        require_once 'Views/Proveedor/Crear.php';
    }

    public function gestionar()
    {
        if (isset($_SESSION['Administrador'])){
            Utilidades::isAdmin();
        }elseif (isset($_SESSION['Usuario'])){
            Utilidades::isUsuario();
        }

        $proveedor = new  Proveedor();
        $prov = $proveedor->All();
        require_once 'Views/Proveedor/Gestionar.php';
    }

    public function save()
    {
        if (isset($_SESSION['Administrador'])){
            Utilidades::isAdmin();
        }elseif (isset($_SESSION['Usuario'])){
            Utilidades::isUsuario();
        }

        if (isset($_POST)) {
            $Razon = isset($_POST['Razon_Social']) ? $_POST['Razon_Social'] : false;
            $Nit = isset($_POST['Nit']) ? $_POST['Nit'] : false;
            $Representante = isset($_POST['Representante']) ? $_POST['Representante'] : false;
            $Telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : false;
            $Direccion = isset($_POST['Direccion']) ? $_POST['Direccion'] : false;
            $Correo = isset($_POST['Correo']) ? $_POST['Correo'] : false;

            if ($Razon && $Nit && $Representante && $Telefono && $Direccion && $Correo) {
                $proveedor = new Proveedor();
                $proveedor->setRazonSocial($Razon);
                $proveedor->setNit($Nit);
                $proveedor->setRepresentante($Representante);
                $proveedor->setTelefono($Telefono);
                $proveedor->setDireccion($Direccion);
                $proveedor->setCorreo($Correo);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $proveedor->setIdPr($id);
                    $Editado = $proveedor->Update();
                }
                $Save = $proveedor->Save();

                if ($Save) {
                    $_SESSION['Agregado'] = 'El Proveedor se ha agragado correctamente';
                }
                if ($Editado) {
                    $_SESSION['Editado'] = 'El Proveedor se ha editado correctamente';
                }
            } else {
                $_SESSION['Falta'] = 'Rellena todos los datos';
            }
        }
        header("Location:" . Base_url . "proveedor/gestionar");
    }

    public function ver()
    {
        if (isset($_SESSION['Administrador'])){
            Utilidades::isAdmin();
        }elseif (isset($_SESSION['Usuario'])){
            Utilidades::isUsuario();
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $proveedor = new Proveedor();
            $proveedor->setIdPr($id);
            $Proveedor = $proveedor->Allone();
            require_once 'Views/Proveedor/Ver.php';
        }
    }


    public function inactivar()
    {
        if (isset($_SESSION['Administrador'])){
            Utilidades::isAdmin();
        }elseif (isset($_SESSION['Usuario'])){
            Utilidades::isUsuario();
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $proveedor = new Proveedor();
            $proveedor->setIdPr($id);
            $proveedor->setEstado('Inactivo');
            $Proveedor = $proveedor->EditEstado();
        }
        header("Location:" . Base_url . "proveedor/gestionar");
    }

    public function activar()
    {
        if (isset($_SESSION['Administrador'])){
            Utilidades::isAdmin();
        }elseif (isset($_SESSION['Usuario'])){
            Utilidades::isUsuario();
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $proveedor = new Proveedor();
            $proveedor->setIdPr($id);
            $proveedor->setEstado('Activo');
            $Proveedor = $proveedor->EditEstado();
        }
        header("Location:" . Base_url . "proveedor/gestionar");
    }


}