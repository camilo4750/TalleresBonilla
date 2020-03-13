<?php
require_once 'Models/Servicio.php';
class ServicioController
{
    public function crear()
    {
        if (isset($_GET['id'])) {
            $Editar = true;
            $id = $_GET['id'];
            $servicio = new Servicio();
            $servicio->setId($id);
            $Servicio = $servicio->Allone();
        }
        require_once 'Views/Servicio/Crear.php';
    }

    public function gestionar()
    {
        $servicio = new Servicio();
        $Servicio = $servicio->All();
        require_once 'Views/Servicio/Gestionar.php';
    }

    public function save()
    {
        if (isset($_POST)){
            $Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : false;
            $Descripcion = isset($_POST['Descripcion']) ? $_POST['Descripcion'] : false;

            if ($Nombre && $Descripcion){
                $servicio = new Servicio();
                $servicio->setNombre($Nombre);
                $servicio->setDescripcion($Descripcion);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $servicio->setId($id);
                    $Editado = $servicio->Update();
                }else{
                    $Save = $servicio->Save();
                }



                if ($Save){
                    $_SESSION['Agregado'] = "El Servicio se ha agregado correctamente";
                }
                if ($Editado){
                    $_SESSION['Editado'] = "El Servicio se ha editado correctamente";
                }
            }
         }
        header("Location:" . Base_url . "servicio/gestionar");
    }

}