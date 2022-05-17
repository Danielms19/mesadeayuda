<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <i class="fa fa-angle-right" aria-hidden="true"></i> Registros de Solicitudes
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>administrador/solicitudes/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar solicitudes</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre solicitud</th>
                                    <th>Tipo de solicitud</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody >
                              <?php if (!empty($solicitudes)): ?>
                              <?php  $n = 1; foreach ($solicitudes as $sol): ?>
                                      <tr>
                                          <td><?php echo $n++;?></td>
                                          <td><?php echo $sol->ts_nombre;?></td>
                                          <td>
                                             <?php if ($sol->ts_padre == "17") {
                                                    echo 'Soporte remoto';
                                                    }
                                                    else if($sol->ts_padre == "27"){
                                                    echo 'Soporte remoto directores';
                                                    }
                                                    else if($sol->ts_padre == "55"){
                                                    echo 'Soporte remoto docentes';
                                                    }
                                              ?>
                                          </td>
                                          <td>
                                              <?php if ($sol->estado == "1") {
                                                    echo '<span class="label label-success">Activo</span>';
                                                    }
                                                    else if($sol->estado == "0"){
                                                    echo '<span class="label label-danger">Desactivado</span>';
                                                    }
                                            ?>
                                          </td>
                                          <td>
                                            <div class="btn-group">
                                                    <?php if ($sol->estado == 1): ?>
                                                    <a href="<?php echo base_url()?>administrador/solicitudes/edit/<?php echo $sol->id_tipo_soporte;?>" 
                                                    class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>administrador/solicitudes/delete/<?php echo $sol->id_tipo_soporte;?>" 
                                                    class="btn btn-danger btn-delete"><span class="fa fa-remove"></span></a>
                                                    <?php else: ?>
                                                    <a href="<?php echo base_url();?>administrador/solicitudes/activar/<?php echo $sol->id_tipo_soporte;?>" 
                                                    class="btn btn-success btn-activar"><span class="fa fa-check"></span></a>
                                                    <?php endif ?>   
                                                

                                          </td>

                                      </tr>
                                  <?php endforeach ?>
                                  <?php endif ?>
                          </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-regsolicitud">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" id="msolicitud" name="msolicitud" aria-label="Close">
          <span aria-hidden="true">x</span></button>
        <h3 class="modal-title">Registrar Solicitud</h3>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" id="mrsolicitud" name="mrsolicitud">Registrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-modisolicitud">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" id="mmsolicitud" name="mmsolicitud" aria-label="Close">
          <span aria-hidden="true">x</span></button>
        <h3 class="modal-title">Modificar Solicitud</h3>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" id="mmodsolicitud" name="mmodsolicitud">Modificar Solicitud</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>