<?php
require_once 'Models/Persona.php';
require_once 'Models/Vehiculo.php';
require_once 'Models/Repuestos.php';
require_once 'Models/Cotizacion.php';
require_once 'Models/Registro.php';

class PersonaController
{

    public function index()
    {
        $persona = new Persona();
        $Total = $persona->total();

        $vehiculo = new Vehiculo();
        $TotalV = $vehiculo->total();

        $Repuesto = new Repuestos();
        $TotalR = $Repuesto->total();

        $Cotizacion = new Cotizacion();
        $TotalC = $Cotizacion->total();

        require_once 'Views/Home.php';
    }

    public function session()
    {
        $usuario = new Registro();
        $Registro = $usuario->All();
        require_once 'Views/session.php';
    }

    public function crear()
    {
        if (isset($_GET['id'])) {
            $Editar = true;
            $id = $_GET['id'];
            $persona = new Persona();
            $persona->setIdP($id);
            $Persona = $persona->Allone();
        }
        require_once 'Views/Persona/Crear.php';
    }

    public function gestionar()
    {
        $persona = new Persona();
        $Persona = $persona->All();
        require_once 'Views/Persona/Gestionar.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $Nombres = isset($_POST['Nombres']) ? $_POST['Nombres'] : false;
            $TipoDoc = isset($_POST['TipoDoc']) ? $_POST['TipoDoc'] : false;
            $Documento = isset($_POST['Documento']) ? $_POST['Documento'] : false;
            $Numero = isset($_POST['Numero']) ? $_POST['Numero'] : false;
            $Direccion = isset($_POST['Direccion']) ? $_POST['Direccion'] : false;
            $Municipio_Id = isset($_POST['Municipio_Id']) ? $_POST['Municipio_Id'] : false;

            if ($Nombres && $TipoDoc && $Documento && $Numero && $Direccion && $Municipio_Id) {
                $persona = new  Persona();
                $persona->setNombres($Nombres);
                $persona->setTipoDoc($TipoDoc);
                $persona->setDocumento($Documento);
                $persona->setNumero($Numero);
                $persona->setDireccion($Direccion);
                $persona->setMunicipioId($Municipio_Id);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $persona->setIdP($id);
                    $Editado = $persona->Update();
                } else {
                    $Save = $persona->Save();
                }


                if ($Save) {
                    $_SESSION['Agregado'] = "La Persona se ha agregado correctamente";
                }
                if ($Editado) {
                    $_SESSION['Editado'] = "La Persona se ha Editado correctamente";
                }

            }
        }
        header("Location:" . Base_url . "persona/gestionar");
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $persona = new Persona();
            $persona->setIdP($id);
            $Persona = $persona->Allone();
            require_once 'Views/Persona/Ver.php';
        }
    }

    public function inactivar()
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $persona = new Persona();
            $persona->setIdP($id);
            $persona->setEstado('Inactivo');
            $Persona = $persona->EditEstado();
        }
        header("Location:" . Base_url . "persona/gestionar");
    }

    public function activar()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $persona = new Persona();
            $persona->setIdP($id);
            $persona->setEstado('Activo');
            $Persona = $persona->EditEstado();
        }
        header("Location:" . Base_url . "persona/gestionar");
    }


}