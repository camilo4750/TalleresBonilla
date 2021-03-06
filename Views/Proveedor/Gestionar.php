<?php
require_once 'Views/sidebar.php';
?>
<!-- DataTables Example -->
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="text-info" href="<?=Base_url?>proveedor/crear">Crear proveedor</a>
        </li>
        <li class="breadcrumb-item active">
            <a class="text-info" href="<?=Base_url?>proveedor/gestionar">Ver tabla proveedores</a>
        </li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Tabla Proveedores</div>
        <div class="card-body">
            <?php if (isset($_SESSION['Agregado'])) : ?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong><?=$_SESSION['Agregado']?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['Editado'])) : ?>
                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                    <strong><?=$_SESSION['Editado']?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['Borrado'])) : ?>
                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                    <strong><?=$_SESSION['Borrado']?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php Utilidades::DeleteSession(); ?>
            <div class="table-responsive">
                <table id="example" class="display table responsive nowrap table-striped table-bordered" style="width:100%" >
                    <thead  class="thead-dark">
                    <tr>
                        <th>Razon social</th>
                        <th>Nit</th>
                        <th>Representante</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Fecha</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($Pro = $prov->fetch_object()) :?>
                        <tr>
                            <td><?= $Pro->Razon_Social ?></td>
                            <td><?= $Pro->Nit ?></td>
                            <td><?= $Pro->Representante ?></td>
                            <td><?= $Pro->Telefono ?></td>
                            <td><?= $Pro->Direccion ?></td>
                            <td><?= $Pro->Fecha ?></td>
                            <td><?= $Pro->Correo ?></td>
                            <?php if ($Pro->Estado == 'Activo') : ?>
                                <td class="text-success"><?= $Pro->Estado ?></td><i class="fas fa-bell"></i></a>
                            <?php else : ?>
                                <td class="text-danger"><?= $Pro->Estado ?></td>
                            <?php endif; ?>
                            <td>
                                <a href="<?=Base_url?>proveedor/crear&id=<?=$Pro->IdPr?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="<?=Base_url?>proveedor/ver&id=<?=$Pro->IdPr?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                <?php if ($Pro->Estado == 'Activo') : ?>
                                    <a href="<?= Base_url ?>proveedor/inactivar&id=<?= $Pro->IdPr ?>" type="button" data-toggle="tooltip" data-placement="top" title="Inactivar" class="btn btn-danger btn-sm"><i class="fas fa-bell"></i></a>
                                <?php else : ?>
                                    <a href="<?= Base_url ?>proveedor/activar&id=<?= $Pro->IdPr ?>" type="button" data-toggle="tooltip" data-placement="top" title="Activar"  class="btn btn-info btn-sm"><i class="fas fa-bell"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>

                    <tfoot  class="thead-dark">
                    <tr>
                        <th>Razon social</th>
                        <th>Nit</th>
                        <th>Representante</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Fecha</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </tfoot>
                    <tbody>

                </table>
            </div>
        </div>
        <div class="card-footer small text-muted"></div>
    </div>
    <?php require_once 'Views/footer.php'; ?>
</div>
