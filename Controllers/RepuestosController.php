<?php
require_once 'Models/Repuestos.php';

class RepuestosController
{
    public function crear()
    {
        if (isset($_GET['id'])) {
            $Editar = true;
            $repuestos = new Repuestos();
            $id = $_GET['id'];
            $repuestos->setIdR($id);
            $Repuestos = $repuestos->Allone();
        }
        require_once 'Views/Repuestos/Crear.php';
    }

    public function gestionar()
    {
        $repuestos = new Repuestos();
        $Repuestos = $repuestos->All();
        require_once 'Views/Repuestos/Gestionar.php';
    }

    public function Save()
    {
        if (isset($_POST)) {
            $Repuestos = isset($_POST['Repuestos']) ? $_POST['Repuestos'] : false;
            $Total = isset($_POST['Total']) ? $_POST['Total'] : false;
            $Fecha = isset($_POST['Fecha']) ? $_POST['Fecha'] : false;
            $Garantia = isset($_POST['Garantia']) ? $_POST['Garantia'] : false;
            $Vehiculo_id = isset($_POST['Vehiculo_id']) ? $_POST['Vehiculo_id'] : false;

            if ($Repuestos && $Total && $Fecha && $Garantia && $Vehiculo_id) {
                $repuestos = new Repuestos();
                $repuestos->setRepuestos($Repuestos);
                $repuestos->setTotal($Total);
                $repuestos->setFecha($Fecha);
                $repuestos->setGarantia($Garantia);
                $repuestos->setVehiculoId($Vehiculo_id);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $repuestos->setIdR($id);
                    $Editado = $repuestos->Update();
                }else{
                    $Save = $repuestos->Save();
                }


                if ($Save) {
                    $_SESSION['Agregado'] = "El repuesto se ha agregado correctamente";
                }
                if ($Editado) {
                    $_SESSION['Editado'] = "El repuesto se ha editado correctamente";
                }
            }
        }
        header("Location:" . Base_url . "repuestos/gestionar");
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $repuestos = new Repuestos();
            $repuestos->setIdR($id);
            $Repuestos = $repuestos->Allone();
            require_once 'Views/Repuestos/Ver.php';
        }
    }

    public function inactivar()
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $repuestos = new Repuestos();
            $repuestos->setIdR($id);
            $repuestos->setEstado('Inactivo');
            $Repuestos = $repuestos->EditEstado();
        }
        header("Location:" . Base_url . "repuestos/gestionar");
    }

    public function activar()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $repuestos = new Repuestos();
            $repuestos->setIdR($id);
            $repuestos->setEstado('Activo');
            $Repuestos = $repuestos->EditEstado();
        }
        header("Location:" . Base_url . "repuestos/gestionar");
    }
}