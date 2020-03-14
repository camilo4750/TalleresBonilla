<?php
require_once 'Models/Modelo.php';
class ModeloController
{
    public function crear()
    {
        if (isset($_GET['id'])){
            $Editar = true;
            $id = $_GET['id'];
            $modelo = new Modelo();
            $modelo->setIdM($id);
            $Modelo = $modelo->Allone();
        }
        require_once 'Views/Modelo/Crear.php';
    }

    public function gestionar()
    {
        $modelo = new Modelo();
        $Modelo  = $modelo->All();
        require_once 'Views/Modelo/Gestionar.php';
    }

    public function save()
{
    if (isset($_POST)){
        $Modelo = isset($_POST['Modelo']) ? $_POST['Modelo'] : false;

        if ($Modelo){
            $modelo = new Modelo();
            $modelo->setModelo($Modelo);

            if (isset($_GET['id'])){
                $id = $_GET['id'];
                $modelo->setIdM($id);
                $Editado = $modelo->Update();
            }else{
                $Save = $modelo->Save();
            }


            if ($Save){
                $_SESSION['Agregado'] = "La Marca se ha agregado correctamente";
            }

            if ($Editado){
                $_SESSION['Editado'] = "La Marca se ha editado correctamente";
            }
        }
    }
    header("Location:" . Base_url . "modelo/gestionar");
}

    public function eliminar()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $modelo = new Modelo();
            $modelo->setIdM($id);
            $Borrar = $modelo->delete();

            if ($Borrar) {
                $_SESSION['Borrado'] = "El Modelo se ha borrado correctamente";
            }
        }
        header("Location:" . Base_url . "modelo/gestionar");
    }
}