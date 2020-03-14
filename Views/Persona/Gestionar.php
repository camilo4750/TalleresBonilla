<?php
require_once 'Views/sidebar.php';
?>
    <!-- DataTables Example -->
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-info" href="<?=Base_url?>persona/crear">Crear persona</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-info" href="<?=Base_url?>persona/gestionar">Ver tabla persona</a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Tabla Personas</div>
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
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>TipoDoc</th>
                            <th>Documento</th>
                            <th>Numero</th>
                            <th>Direccion</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Municipio</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($persona = $Persona->fetch_object()) :?>
                            <tr>
                                <td><?= $persona->idP ?></td>
                                <td><?= $persona->Nombres ?></td>
                                <td><?= $persona->TipoDoc ?></td>
                                <td><?= $persona->Documento ?></td>
                                <td><?= $persona->Numero ?></td>
                                <td><?= $persona->Direccion ?></td>
                                <td><?= $persona->Rol ?></td>
                                <?php if ($persona->Estado == 'Activo') : ?>
                                    <td class="text-success"><?= $persona->Estado ?></td><i class="fas fa-bell"></i></a>
                                <?php else : ?>
                                    <td class="text-danger"><?= $persona->Estado ?></td>
                                <?php endif; ?>
                                <td><?= $persona->Municipio ?></td>
                                <td>
                                    <a href="<?=Base_url?>persona/crear&id=<?=$persona->idP?>" data-toggle="tooltip" data-placement="top" title="Editar"  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?=Base_url?>persona/ver&id=<?=$persona->idP?>" data-toggle="tooltip" data-placement="top" title="Ver"  class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    <?php if ($persona->Estado == 'Activo') : ?>
                                        <a href="<?= Base_url ?>persona/inactivar&id=<?= $persona->idP ?>" type="button" data-toggle="tooltip" data-placement="top" title="Inactivar" class="btn btn-danger btn-sm"><i class="fas fa-bell"></i></a>
                                    <?php else : ?>
                                        <a href="<?= Base_url ?>persona/activar&id=<?= $persona->idP ?>" type="button" data-toggle="tooltip" data-placement="top" title="Activar"  class="btn btn-info btn-sm"><i class="fas fa-bell"></i></a>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>

                        <tfoot  class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>TipoDoc</th>
                            <th>Documento</th>
                            <th>Numero</th>
                            <th>Direccion</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Municipio</th>
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
