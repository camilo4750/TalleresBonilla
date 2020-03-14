<?php
require_once 'Views/sidebar.php';
?>
    <!-- DataTables Example -->
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-info" href="<?= Base_url ?>proveedor/crear">Crear proveedor</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-info" href="<?= Base_url ?>proveedor/gestionar">Ver tabla proveedores</a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Datos del proveedor: <strong><?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Razon_Social : "" ?></strong>
            </div>
            <div class="card-body">

                <table class="table table-hover table-bordered table-responsive-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th>Campo</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><strong>Razon social:</strong></td>
                        <td><?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Razon_Social : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nit:</strong></td>
                        <td><?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Nit : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Representante:</strong></td>
                        <td><?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Representante : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Telefono:</strong></td>
                        <td><?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Telefono : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Direccion:</strong></td>
                        <td><?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Direccion : "" ?></td>
                    </tr>

                    <tr>
                        <td><strong>Correo:</strong></td>
                        <td><?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Correo : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Fecha:</strong></td>
                        <td><?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Fecha : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Estado:</strong></td>
                        <td><?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Estado : "" ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
        <?php require_once 'Views/footer.php'; ?>
    </div>
