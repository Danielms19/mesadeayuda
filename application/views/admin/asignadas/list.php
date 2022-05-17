<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-angle-right" aria-hidden="true"></i> Solicitudes de Soporte Técnico Asignadas
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box box-solid">
      <div class="box-body">
          <div class="row">
              <div class="col-md-12">
                  <table id="example1" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th style="font-size:12px;">Número de Solicitud</th>
                              <th style="font-size:12px;">Area</th>
                              <th style="font-size:12px;">Usuario</th>
                              <th style="font-size:12px;">Descripción</th>
                              <th style="font-size:12px;">Fecha de Proceso</th>
                              <th style="font-size:12px;">Fecha de Asignación</th>
                              <th style="font-size:12px;">Acciones</th>
                          </tr>
                      </thead>
                      <tbody >
                          <?php if (!empty($asignadas)): ?>
                          <?php  $n = 1; foreach ($asignadas as $rpt): ?>
                                  <tr>
                                      <td style="font-size:12px;"><?php echo $rpt->id_solicitud;?></td>
                                      <td style="font-size:12px;"><?php echo $rpt->sl_area;?></td>
                                      <td style="font-size:12px;"><?php echo $rpt->sl_nombres;?></td>
                                      <td style="font-size:12px;"><?php echo $rpt->sl_descripcion;?></td>
                                      <td style="font-size:12px;"><?php echo $rpt->sl_fecha_proceso;?></td>
                                      <td style="font-size:12px;"><?php echo $rpt->as_fecha_asignacion;?></td>
                                      <td>
                                      <div class="btn">                                     
                                          <button type="button" class="btn btn-primary btn-view-adiagnostico btn-xs"
                                          id_solicitud="<?php echo $rpt->id_solicitud;?>"  
                                          id_asignacion="<?php echo $rpt->id_asignacion;?>" 
                                          data-toggle="modal" data-target="#modal-adiagnostico">
                                          <i class="fa fa-life-ring" aria-hidden="true"></i> Diagnostico</button> 

                                          <button type="button" class="btn btn-danger btn-view-atecnico btn-xs"
                                          id_solicitud="<?php echo $rpt->id_solicitud;?>"  
                                          id_asignacion="<?php echo $rpt->id_asignacion;?>" 
                                          data-toggle="modal" data-target="#modal-atecnico">
                                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Reasignar tecnico</button> 

                                          <button type="button" class="btn btn-default btn-view-acierre btn-xs"
                                          id_solicitud="<?php echo $rpt->id_solicitud;?>"  
                                          id_asignacion="<?php echo $rpt->id_asignacion;?>" 
                                          data-toggle="modal" data-target="#modal-acierre">
                                          <i class="fa fa-times" aria-hidden="true"></i> Cierre</button> 
                                      </div>  
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

<div class="modal fade" id="modal-adiagnostico">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" id="mcerrar" name="mcerrar" aria-label="Close">
          <span aria-hidden="true">x</span></button>
        <h3 class="modal-title">Diagnostico Técnico</h3>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" id="btnadiagnostico" name="btnadiagnostico" onclick="Enviando()">Diagnosticar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-atecnico">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" id="mcerrar" name="mcerrar" aria-label="Close">
          <span aria-hidden="true">x</span></button>
        <h3 class="modal-title">Reasignar Técnico</h3>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" id="btnatecnico" name="btnatecnico">Asignar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-acierre">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" id="mcerrar" name="mcerrar" aria-label="Close"">
          <span aria-hidden="true">x</span></button>
        <h3 class="modal-title">Cerrar Solicitud de Soporte Técnico</h3>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" id="btnacierre" name="btnacierre" onclick="Enviando()">Cerrar Solicitud</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Modal para Envio de Corre-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
<!--
<script>
function Enviando(){  
swal({
  title: "Cargando",
  text: "Enviando Email...",
  type: "info",
  timer: 11000,
  showConfirmButton: false,
  allowOutsideClick: false
});
     } 
</script>
-->