<?php
require_once 'Models/Registro.php';

class RegistroController
{
    public function crear()
    {
        if (isset($_SESSION['Administrador'])){
            Utilidades::isAdmin();
        }

        if (isset($_GET['id'])) {
            $Editar = true;
            $id = $_GET['id'];
            $registro = new Registro();
            $registro->setIdR($id);
            $Registro = $registro->Allone();
        }
        require_once 'Views/Usuarios/Crear.php';
    }

    public function gestionar()
    {
        if (isset($_SESSION['Administrador'])){
            Utilidades::isAdmin();
        }

        $registro = new Registro();
        $Registro = $registro->All();
        require_once 'Views/Usuarios/Gestionar.php';
    }

    public function login()
    {
        if (isset($_POST)) {
            $persona = new Registro();
            $persona->setEmail($_POST['Email']);
            $persona->setPassword($_POST['Password']);
            $identificado = $persona->Login();
            if ($identificado && is_object($identificado)) {
                if ($identificado->Rol == 'Administrador') {
                    $_SESSION['Administrador'] = $identificado;
                    header("Location:" . Base_url . "persona/index");
                }
                if ($identificado->Rol == 'Usuario') {
                    $_SESSION['Usuario'] = $identificado;
                    header("Location:" . Base_url . "persona/index");
                }
            } else {
                $_SESSION['error'] = "Login incorrecto";
                header("Location:" . Base_url);
            }

        } else {
            $_SESSION['error'] = "Login incorrecto";
        }
    }

    public function logaut()
    {
        if (isset($_SESSION['Administrador'])) {
            unset($_SESSION['Administrador']);
        }

        if (isset($_SESSION['Usuario'])) {
            unset($_SESSION['Usuarios']);
        }
        header("Location:" . Base_url);
    }

    public function save()
    {
        if (isset($_POST)) {
            $Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : false;
            $Email = isset($_POST['Email']) ? $_POST['Email'] : false;
            $Password = isset($_POST['Password']) ? $_POST['Password'] : false;
            $Rol = isset($_POST['Rol']) ? $_POST['Rol'] : false;

            if ($Nombre && $Email && $Password && $Rol) {
                $registro = new Registro();
                $registro->setNombre($Nombre);
                $registro->setEmail($Email);
                $registro->setPassword($Password);
                $registro->setRol($Rol);
                $Save = $registro->Save();

                if ($Save) {
                    $_SESSION['Agregado'] = 'El usuario se ha creado correctamente, por favor no olvide guardar contraseña';
                }
            }
        }
        header("Location:" . Base_url);
    }

    public function hacer()
    {
        if (isset($_SESSION['Administrador'])){
            Utilidades::isAdmin();
        }elseif (isset($_SESSION['Usuario'])){
            Utilidades::isUsuario();
        }

        if (isset($_POST)) {
            $Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : false;
            $Email = isset($_POST['Email']) ? $_POST['Email'] : false;
            $Rol = isset($_POST['Rol']) ? $_POST['Rol'] : false;

            if ($Nombre && $Email && $Rol) {
                $registro = new Registro();
                $registro->setNombre($Nombre);
                $registro->setEmail($Email);
                $registro->setPassword($_POST['Password']);
                $registro->setRol($Rol);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $registro->setIdR($id);
                    $Editado = $registro->Update();
                } else {
                    $Save = $registro->Save();
                }


                if ($Save) {
                    $_SESSION['Agregado'] = 'El usuario se ha creado correctamente, por favor no olvide guardar contraseña';
                }
                if ($Editado) {
                    $_SESSION['Editado'] = 'El usuario se ha Editado correctamente, por favor no olvide guardar contraseña';
                }
            }
        }
        header("Location:" . Base_url . "registro/gestionar");
    }

}