<?php
require_once 'Models/Vehiculo.php';

class VehiculoController
{
    public function crear()
    {
        if (isset($_GET['id'])) {
            $Editar = true;
            $id = $_GET['id'];
            $vehiculo = new Vehiculo();
            $vehiculo->setId($id);
            $Vehiculo = $vehiculo->Allone();
        }
        require_once 'Views/Vehiculo/Crear.php';
    }

    public function gestionar()
    {
        $vehiculo = new Vehiculo();
        $Vehiculo = $vehiculo->All();
        require_once 'Views/Vehiculo/Gestionar.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $Placa = isset($_POST['Placa']) ? $_POST['Placa'] : false;
            $Color = isset($_POST['Color']) ? $_POST['Color'] : false;
            $Modelo_Id = isset($_POST['Modelo_IdM']) ? $_POST['Modelo_IdM'] : false;
            $Marca_id = isset($_POST['Marca_idMarca']) ? $_POST['Marca_idMarca'] : false;
            $Persona_id = isset($_POST['Persona_idP']) ? $_POST['Persona_idP'] : false;

            if ($Placa && $Color && $Modelo_Id && $Marca_id && $Persona_id) {
                $vehiculo = new Vehiculo();
                $vehiculo->setPlaca($Placa);
                $vehiculo->setColor($Color);
                $vehiculo->setModeloId($Modelo_Id);
                $vehiculo->setMarcaIdMarca($Marca_id);
                $vehiculo->setPersonaIdP($Persona_id);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $vehiculo->setId($id);

                    $Editado = $vehiculo->Update();
                } else {
                    $Save = $vehiculo->Save();
                }

                if ($Save) {
                    $_SESSION['Agregado'] = "El Automovil se ha agregado correctamente";
                }
                if ($Editado) {
                    $_SESSION['Editado'] = "El Automovil se ha editado correctamente";
                }
            }
        }
        header("Location:" . Base_url . "vehiculo/gestionar");
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $vehiculo = new Vehiculo();
            $vehiculo->setId($id);
            $Vehiculo = $vehiculo->Allone();
            require_once 'Views/Vehiculo/Ver.php';
        }
    }

    public function inactivar()
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $vehiculo = new Vehiculo();
            $vehiculo->setId($id);
            $vehiculo->setEstado('Inactivo');
            $Vehiculo = $vehiculo->EditEstado();
        }
        header("Location:" . Base_url . "vehiculo/gestionar");
    }

    public function activar()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $vehiculo = new Vehiculo();
            $vehiculo->setId($id);
            $vehiculo->setEstado('Activo');
            $Vehiculo = $vehiculo->EditEstado();
        }
        header("Location:" . Base_url . "vehiculo/gestionar");
    }

}