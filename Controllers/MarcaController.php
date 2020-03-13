<?php
require_once 'Models/Marca.php';

class MarcaController
{
    public function crear()
    {
        if (isset($_GET['id'])) {
            $Editar = true;
            $id = $_GET['id'];
            $marca = new Marca();
            $marca->setIdMarca($id);
            $Marca = $marca->Allone();
        }
        require_once 'Views/Marca/Crear.php';
    }

    public function gestionar()
    {
        $marca = new Marca();
        $Marca = $marca->All();
        require_once 'Views/Marca/Gestionar.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : false;

            if ($Nombre) {
                $marca = new Marca();
                $marca->setNombre($Nombre);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $marca->setIdMarca($id);
                    $Editado = $marca->Update();
                }else{
                    $Save = $marca->Save();
                }


                if ($Save) {
                    $_SESSION['Agregado'] = "La Marca se ha agregado correctamente";
                }
                if ($Editado) {
                    $_SESSION['Editado'] = "La Marca se ha editado correctamente";
                }
            }
        }
        header("Location:" . Base_url . "marca/gestionar");
    }
}