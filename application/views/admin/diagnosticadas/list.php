<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <i class="fa fa-angle-right" aria-hidden="true"></i> Solicitudes de Soporte Técnico Diagnosticadas
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
                                <th style="font-size:12px;">Fecha de Diagnostico</th>
                                <th style="font-size:12px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php if (!empty($diagnosticadas)): ?>
                                <?php  $n = 1; foreach ($diagnosticadas as $rpt): ?>
                                        <tr>
                                            <td style="font-size:12px;"><?php echo $rpt->id_solicitud;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_area;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_nombres;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_descripcion;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_fecha_proceso;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->as_fecha_asignacion;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->dg_fecha_diagnostico;?></td>
                                            <td>
                                                <div class="btn">                                     
                                                <button type="button" class="btn btn-primary btn-view-dresolver btn-xs"
                                                id_solicitud="<?php echo $rpt->id_solicitud;?>"  
                                                id_asignacion="<?php echo $rpt->id_asignacion;?>" 
                                                data-toggle="modal" data-target="#modal-dresolver">
                                                <i class="fa fa-life-ring" aria-hidden="true"></i> Resolver</button> 

                                                <button type="button" class="btn btn-danger btn-view-deditar btn-xs"
                                                id_solicitud="<?php echo $rpt->id_solicitud;?>"  
                                                id_asignacion="<?php echo $rpt->id_asignacion;?>"
                                                id_diagnostico="<?php echo $rpt->id_diagnostico;?>"
                                                data-toggle="modal" data-target="#modal-deditar">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Diágnostico</button> 

                                                <button type="button" class="btn btn-default btn-view-dcierre btn-xs"
                                                id_solicitud="<?php echo $rpt->id_solicitud;?>"  
                                                id_asignacion="<?php echo $rpt->id_asignacion;?>" 
                                                data-toggle="modal" data-target="#modal-dcierre">
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

<div class="modal fade" id="modal-dresolver">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" id="mcerrar" name="mcerrar" aria-label="Close">
          <span aria-hidden="true">x</span></button>
        <h3 class="modal-title">Resolución Tecnica</h3>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" id="btndresolver" name="btndresolver" onclick="Enviando()">Resolver</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-deditar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" id="mcerrar" name="mcerrar" aria-label="Close">
          <span aria-hidden="true">x</span></button>
        <h3 class="modal-title">Modificar Diagnóstico</h3>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" id="btndeditar" name="btndeditar">Modificar Diagnostico</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-dcierre">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" id="mcerrar" name="mcerrar" aria-label="Close">
          <span aria-hidden="true">x</span></button>
        <h3 class="modal-title">Cerrar Solicitud de Soporte Técnico</h3>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" id="btndcierre" name="btndcierre" onclick="Enviando()">Cerrar Solicitud</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Modal para Envio de Correo-->
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