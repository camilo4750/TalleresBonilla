<?php
require_once 'Views/sidebar.php';
?>
    <!-- DataTables Example -->
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-info" href="<?=Base_url?>marca/crear">Crear marca</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-info" href="<?=Base_url?>marca/gestionar">Ver tabla marca</a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Tabla Marcas</div>
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
                            <th>Marca</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($marca = $Marca->fetch_object()) :?>
                            <tr>
                                <td><?= $marca->idMarca ?></td>
                                <td><?= $marca->Nombre ?></td>
                                <td>
                                    <a href="<?=Base_url?>marca/crear&id=<?=$marca->idMarca?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?=Base_url?>marca/delete&id=<?=$marca->idMarca?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>

                        <tfoot  class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Acciones</th>
                        </tr>
                        </tfoot>
                        <tbody>

                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>
<?php require_once 'Views/footer.php'; ?>