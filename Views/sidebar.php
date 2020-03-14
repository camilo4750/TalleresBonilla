<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Taller</title>

    <!-- Custom fonts for this template-->
    <link href="<?= Base_url ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?= Base_url ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="<?= Base_url ?>assets/css/sb-admin.css" rel="stylesheet">
    <link href="<?= Base_url ?>assets/css/Style.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark static-top" style="background: #3A5A6F">

    <a class="navbar-brand mr-1" href="<?= Base_url ?>persona/index">Talleres Bonilla</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <?php if (isset($_SESSION['Administrador']) || isset($_SESSION['Usuario'])) : ?>
                <h6 class="text-white mt-2 mr-3">Bienvenido: <?= $_SESSION['Administrador']->Nombre ?></h6>

            <?php endif; ?>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-tie fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= Base_url ?>registro/logaut">Cerrar session</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= Base_url ?>registro/crear">Crear Usuario</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= Base_url ?>registro/gestionar">Ver Usuarios</a>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav" style="background: #7FABC7">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="pagesDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-cash-register"></i>

                <span>Cotizacion</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= Base_url ?>cotizacion/crear">Crear</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= Base_url ?>cotizacion/gestionar">Ver</a>
            </div>

        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="pagesDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-user"></i>
                <span>Persona</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= Base_url ?>persona/crear">Crear</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= Base_url ?>persona/gestionar">Ver</a>

            </div>
        </li>


        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="pagesDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-hammer"></i>
                <span>Repuestos</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= Base_url ?>repuestos/crear">Crear</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= Base_url ?>repuestos/gestionar">Ver</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="pagesDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-car-side"></i>
                <span>Vehiculo</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= Base_url ?>vehiculo/crear">Crear</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= Base_url ?>vehiculo/gestionar">Ver</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="pagesDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-brush"></i>
                <span>Servicio</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= Base_url ?>servicio/crear">Crear</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= Base_url ?>servicio/gestionar">Ver</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="pagesDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Modelo</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= Base_url ?>modelo/crear">Crear</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= Base_url ?>modelo/gestionar">Ver</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="pagesDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Marca</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= Base_url ?>marca/crear">Crear</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= Base_url ?>marca/gestionar">Ver</a>
            </div>
        </li>


        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="pagesDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-id-card"></i>
                <span>Proveedor</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= Base_url ?>proveedor/crear">Crear</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= Base_url ?>proveedor/gestionar">Ver</a>
            </div>
        </li>

    </ul>

    <div id="content-wrapper">
