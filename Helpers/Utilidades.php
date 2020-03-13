<?php
class Utilidades
{
    public static function DeleteSession()
    {
        $borrado = false;

        if (isset($_SESSION['Agregado'])) {
            $_SESSION['Agregado'] = null;
            $borrado = true;
        }

        if (isset($_SESSION['Editado'])) {
            $_SESSION['Editado'] = null;
            $borrado = true;
        }

        if (isset($_SESSION['Borrado'])) {
            $_SESSION['Borrado'] = null;
            $borrado = true;
        }
        if (isset($_SESSION['error'])) {
            $_SESSION['error'] = null;
            $borrado = true;
        }

        return $borrado;
    }

    public static function ShowModelo()
    {
        require_once 'Models/Modelo.php';
        $modelo = new Modelo();
        $Modelos = $modelo->All();
        return $Modelos;
    }

    public  static function ShowMarca()
    {
        require_once 'Models/Marca.php';
        $marca = new Marca();
        $Marcas = $marca->All();
        return $Marcas;
    }

    public  static function ShowMunicipio()
    {
        require_once 'Models/Municipio.php';
        $municipio = new Municipio();
        $Municipio = $municipio->All();
        return $Municipio;
    }

    public  static function ShowVehiculo()
    {
        require_once 'Models/Vehiculo.php';
        $vehiculo = new Vehiculo();
        $Vehiculo = $vehiculo->All();
        return $Vehiculo;
    }

    public  static function ShowPersonas()
    {
        require_once 'Models/Persona.php';
        $persona = new Persona();
        $Persona = $persona->All();
        return $Persona;
    }

    public  static function ShowServicio()
    {
        require_once 'Models/Servicio.php';
        $servicio = new Servicio();
        $Servicio = $servicio->All();
        return $Servicio;
    }

    public  static function ShowRepuestos()
    {
        require_once 'Models/Repuestos.php';
        $repuestos = new Repuestos();
        $Repuestos = $repuestos->All();
        return $Repuestos;
    }

}