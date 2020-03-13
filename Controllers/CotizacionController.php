<?php
require_once 'Models/Cotizacion.php';

class CotizacionController
{
    public function crear()
    {
        if (isset($_GET['id'])) {
            $Editar = true;
            $id = $_GET['id'];
            $cotizacion = new Cotizacion();
            $cotizacion->setIdC($id);
            $Cotizacion = $cotizacion->Allone();
        }
        require_once 'Views/Cotizacion/Crear.php';
    }

    public function gestionar()
    {
        $cotizacion = new Cotizacion();
        $Cotizacion = $cotizacion->All();
        require_once 'Views/Cotizacion/Gestionar.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $N_Serial = isset($_POST['N_Serial']) ? $_POST['N_Serial'] : false;
            $Labor = isset($_POST['Labor']) ? $_POST['Labor'] : false;
            $Abono = isset($_POST['Abono']) ? $_POST['Abono'] : false;
            $Servicio_Id = isset($_POST['Servicio_Id']) ? $_POST['Servicio_Id'] : false;
            $Persona_id = isset($_POST['Persona_idP']) ? $_POST['Persona_idP'] : false;
            $Vehiculo_idV = isset($_POST['Vehiculo_id']) ? $_POST['Vehiculo_id'] : false;

            if ($N_Serial && $Labor && $Abono && $Servicio_Id && $Persona_id && $Vehiculo_idV) {
                $cotizacion = new Cotizacion();
                $cotizacion->setNSerial($N_Serial);
                $cotizacion->setLabor($Labor);
                $cotizacion->setAbono($Abono);
                $cotizacion->setRepuestosIdR($_POST['Repuestos_IdR']);
                $cotizacion->setServicioId($Servicio_Id);
                $cotizacion->setFechaFin($_POST['Fecha_Fin']);
                $cotizacion->setFecha($_POST['Fecha']);
                $cotizacion->setPersonaIdP($Persona_id);
                $cotizacion->setVehiculoIds($Vehiculo_idV);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $cotizacion->setIdC($id);
                    $Editado = $cotizacion->Update();
                }else{
                    $Save = $cotizacion->Save();
                }


                if ($Save) {
                    $_SESSION['Agregado'] = "La cotizacion se ha agregado correctamente";
                }

                if ($Editado) {
                    $_SESSION['Editado'] = "La cotizacion se ha editado correctamente";
                }
            }
        }
        header("Location:" . Base_url . "cotizacion/gestionar");
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $cotizacion = new Cotizacion();
            $cotizacion->setIdC($id);
            $Cotizacion = $cotizacion->Allone();
            require_once 'Views/Cotizacion/Ver.php';
        }
    }

    public function total(){

    }

}