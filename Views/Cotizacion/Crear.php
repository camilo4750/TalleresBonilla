<?php require_once 'Views/sidebar.php'; ?>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="text-danger" href="<?=Base_url?>cotizacion/crear">Crear cotizacion</a>
        </li>
        <li class="breadcrumb-item active">
            <a class="text-danger" href="<?=Base_url?>cotizacion/gestionar">Ver tabla cotizacion</a>
        </li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <?php if (isset($Editar) && isset($Cotizacion) && is_object($Cotizacion)) : ?>
            <i class="fas fa-chart-area"></i>
           Editar: <strong> <?=$Cotizacion->N_Serial?></strong> </div>
           <?php $AccionUrl = Base_url . "cotizacion/save&id=" . $Cotizacion->IdC ?>
<?php else: ?>
<i class="fas fa-chart-area"></i>
            Crear Cotizacion</div>

            <?php $AccionUrl = Base_url . "cotizacion/save" ?>
<?php  endif; ?>
            
        <div class="card-body">
            <form action="<?=$AccionUrl?>" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col">
                        <label>Serial</label>
                        <input type="text" class="form-control" name="N_Serial" value="<?=isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->N_Serial : false;?>">
                    </div>
                    <div class="col">
                        <label>Labor</label>
                        <input type="text" class="form-control" name="Labor" value="<?=isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->Labor : false;?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label>Tipo de Servicio</label>
                        <?php $Servicio = Utilidades::ShowServicio() ?>
                        <select class="form-control" name="Servicio_Id">
                            <?php while ($servicio = $Servicio->fetch_object()) : ?>
                                <option value="<?=$servicio->Id?>" <?= isset($Cotizacion) && is_object($Cotizacion) && $servicio->Id == $Cotizacion->Servicio_Id ? 'selected' : "" ?>>
                                    <?=$servicio->Id?> - <?=$servicio->Nombre?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label>Persona</label>
                        <?php $Persona = Utilidades::ShowPersonas() ?>
                        <select class="form-control" name="Persona_idP">
                            <?php while ($persona = $Persona->fetch_object()) : ?>
                                <option value="<?=$persona->idP?>" <?= isset($Cotizacion) && is_object($Cotizacion) && $persona->idP == $Cotizacion->Persona_idP ? 'selected' : "" ?>>
                                    <?=$persona->Nombres?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <label>Repuestos</label>
                        <?php $Repuestos = Utilidades::ShowRepuestos() ?>
                        <select class="form-control" name="Repuestos_IdR">
                            <?php while ($repuestos = $Repuestos->fetch_object()) : ?>
                                <option value="<?=$repuestos->IdR?>" <?= isset($Cotizacion) && is_object($Cotizacion) && $repuestos->IdR == $Cotizacion->Repuestos_IdR ? 'selected' : "" ?>>
                                    <?=$repuestos->IdR?> - <?=$repuestos->Repuestos?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label>Placa del Vehiculo</label>
                        <?php $Vehiculo = Utilidades::ShowVehiculo() ?>
                        <select class="form-control" name="Vehiculo_id">
                            <?php while ($vehiculo = $Vehiculo->fetch_object()) : ?>
                                <option value="<?=$vehiculo->id?>" <?= isset($Cotizacion) && is_object($Cotizacion) && $vehiculo->id == $Cotizacion->Vehiculo_id ? 'selected' : "" ?>>
                                    <?=$vehiculo->id?>.  <?=$vehiculo->Placa?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">

                        <label>Total o abono</label>
                        <input type="number" name="Abono" class="form-control" value="<?=isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->Abono : false;?>">
                    </div>
                    <div class="col">
                        <label>Fecha Inicio</label>
                        <input type="date" class="form-control" name="Fecha"  value="<?=isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->Fecha : false;?>">

                    </div>
                </div>
                <div class="form-row mt-3">
                <div class="col">

                    <label>Fecha Fin</label>
                    <input type="date" class="form-control" name="Fecha_Fin"  value="<?=isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->Fecha_Fin : false;?>">
                </div>
                <div class="col">

                </div>
        </div>
               <input type="submit" class="btn btn-success mt-3" value="Enviar">
            </form>
        </div>
        <div class="container">
  <div class="row">
        <button type="button" class="btn btn-info mt-3 mb-3 ml-3" style="height: 50px; width: 200px;" data-toggle="modal" data-target="#exampleModalScrollable">
  Agregar Persona
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="<?=Base_url?>persona/save" method="POST">
              <div class="form-row">
                  <div class="col">
                      <label>Nombre Completo</label>
                      <input type="text" name="Nombres" class="form-control">
                  </div>
                  <div class="col">
                      <label>Tipo de documento</label>
                      <select class="form-control" name="TipoDoc">
                          <option value="C.C">C.C</option>
                          <option value="C.E">C.E</option>
                          <option value="P.A">P.A</option>
                          <option value="R.C">R.C</option>
                          <option value="T.I">T.I</option>
                      </select>
                  </div>
              </div>

              <div class="form-row">
                  <div class="col">
                      <label>Documento</label>
                      <input type="text" name="Documento" class="form-control">
                  </div>
                  <div class="col">
                      <label>Numero telefonico</label>
                      <input type="text" name="Numero" class="form-control">
                  </div>
              </div>
              <div class="form-row mt-3">
                  <div class="col">
                      <label>Direccion</label>
                      <input type="text" name="Direccion" class="form-control">
                  </div>
                  <div class="col">
                      <label>Municipio</label>
                      <?php $Municipio= Utilidades::ShowMunicipio(); ?>
                      <select class="form-control" name="Municipio_Id">
                          <?php while ($municipio = $Municipio->fetch_object()) : ?>
                              <option value="<?=$municipio->Id?>">
                                  <?=$municipio->Nombre?>
                              </option>
                          <?php endwhile; ?>
                      </select>
                  </div>
              </div>

              <button type="submit" class="btn btn-success mt-3">Agregar</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-info mt-3 mb-3 ml-3" style="height: 50px; width: 200px;" data-toggle="modal" data-target="#exampleModalScrollable2">
  Agregar Vehiculo
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Vehiculo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="<?=Base_url?>vehiculo/save" method="POST">
              <div class="form-row">
                  <div class="col">
                      <label>Color</label>
                      <input type="text" name="Color" class="form-control">
                  </div>
                  <div class="col">
                      <label>Placa automovil</label>
                      <input type="text" name="Placa" class="form-control">
                  </div>
              </div>

              <div class="form-row">
                  <div class="col">
                      <label>Modelo</label>
                      <?php $Modelo = Utilidades::ShowModelo() ?>
                      <select class="form-control" name="Modelo_IdM">
                          <?php while ($modelo = $Modelo->fetch_object()) : ?>
                              <option value="<?= $modelo->IdM ?>">
                                  <?= $modelo->Modelo ?>
                              </option>
                          <?php endwhile; ?>
                      </select>
                  </div>
                  <div class="col">
                      <label>Marca</label>
                      <?php $Marca = Utilidades::ShowMarca() ?>
                      <select class="form-control" name="Marca_idMarca">
                          <?php while ($marca = $Marca->fetch_object()) : ?>
                              <option value="<?= $marca->idMarca ?>">
                                  <?= $marca->Nombre ?>
                              </option>
                          <?php endwhile; ?>
                      </select>
                  </div>
              </div>
              <div class="form-row mt-3">
                  <div class="col">
                      <label>Persona</label>
                      <?php $Persona = Utilidades::ShowPersonas() ?>
                      <select class="form-control" name="Persona_idP">
                          <?php while ($persona = $Persona->fetch_object()) : ?>
                              <option value="<?= $persona->idP ?>">
                                  <?= $persona->Nombres ?>
                              </option>
                          <?php endwhile; ?>
                      </select>
                  </div>
                  <div class="col">

                  </div>
              </div>
                  <button type="submit" class="btn btn-success mt-3">Agregar</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

      <button type="button" class="btn btn-info mt-3 mb-3 ml-3" style="height: 50px; width: 200px;" data-toggle="modal" data-target="#exampleModalScrollable3">
              Agregar Repuestos
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalScrollable3" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Repuesto</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="<?=Base_url?>repuestos/save" method="POST">
                          <div class="form-row">
                              <div class="col">
                                  <label>Repuestos</label>
                                  <input type="" name="Repuestos" class="form-control">
                              </div>
                              <div class="col">
                                  <label>Total</label>
                                  <input type="number" name="Total" class="form-control">
                              </div>
                          </div>

                          <div class="form-row">
                              <div class="col">
                                  <label>Fecha</label>
                                  <input type="date" name="Fecha" class="form-control">
                              </div>
                              <div class="col">
                                  <label>Garantia</label>
                                  <select class="form-control" name="Garantia">
                                      <option value="Si">Si</option>
                                      <option value="No">No</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-row mt-3">
                              <div class="col">
                                  <label>Vehiculo</label>
                                  <?php $Vehiculo = Utilidades::ShowVehiculo() ?>
                                  <select class="form-control" name="Vehiculo_id">
                                      <?php while ($vehiculo = $Vehiculo->fetch_object()) : ?>
                                          <option value="<?= $vehiculo->id ?>">
                                              <?= $vehiculo->Placa ?>
                                          </option>
                                      <?php endwhile; ?>
                                  </select>
                              </div>
                              <div class="col">
                              </div>
                          </div>
                              <button type="submit" class="btn btn-success mt-3">Agregar</button>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>

</div>

  </div>
    </div>

<?php require_once 'Views/footer.php'; ?>