<?php
require_once 'Views/sidebar.php';
?>
    <!-- DataTables Example -->
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-info" href="<?=Base_url?>modelo/crear">Crear modelo</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-info" href="<?=Base_url?>modelo/gestionar">Ver tabla modelo</a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Tabla Modelos</div>
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
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
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
                            <th>Modelo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($modelo = $Modelo->fetch_object()) :?>
                            <tr>
                                <td><?= $modelo->IdM ?></td>
                                <td><?= $modelo->Modelo ?></td>
                                <td>
                                    <a href="<?=Base_url?>modelo/crear&id=<?=$modelo->IdM?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?=Base_url?>modelo/eliminar&id=<?=$modelo->IdM?>" class="btn btn-danger btn-sm" onClick=mi_alerta()><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>

                        <tfoot  class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Modelo</th>
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
<SCRIPT LANGUAGE="JavaScript">
    function mi_alerta () {
        alert ("Esta seguro de eliminar este Modelo.? recuerde que si este Modelo esta en uso no podra ser eliminado");
    }
</SCRIPT>