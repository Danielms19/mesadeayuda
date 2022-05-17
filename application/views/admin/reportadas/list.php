<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <i class="fa fa-angle-right" aria-hidden="true"></i> Solicitudes de Soporte Técnico Reportadas
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
                                    <th style="font-size:12px;">#</th>
                                    <th style="font-size:12px;">Area</th>
                                    <th style="font-size:12px;">Usuario</th>
                                    <th style="font-size:12px;">Descripción</th>
                                    <th style="font-size:12px;">Hora</th>
                                    <th style="font-size:12px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php if (!empty($reportadas)): ?>
                                <?php  $n = 1; foreach ($reportadas as $rpt): ?>
                                        <tr>
                                            <td style="font-size:12px;"><?php echo $rpt->id_solicitud;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_area;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_nombres;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_descripcion;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_fecha_proceso;?></td>
                                            <td>
                                            <?php if(($this->session->userdata('tipo_id') == 1 )){?>
                                                <div class="btn">                              
                                                    <button type="button" class="btn btn-primary btn-view-asignar btn-xs" 
                                                    value="<?php echo $rpt->id_solicitud;?>" data-toggle="modal" 
                                                    data-target="#modal-default"><i class="fa fa-life-ring" aria-hidden="true">
                                                    </i> Asignar tecnico</button> 

                                                    <button type="button" class="btn btn-default btn-view-rcierre btn-xs" 
                                                    value="<?php echo $rpt->id_solicitud;?>" data-toggle="modal" 
                                                    data-target="#modal-rcierre"><i class="fa fa-times" aria-hidden="true">
                                                    </i> Cerrar</button> 
                                                </div>  
                                            <?php } ?>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" id="mcerrar" name="mcerrar" aria-label="Close">
          <span aria-hidden="true">x</span></button>
        <h3 class="modal-title">Asignar Tecnico</h3>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" id="mrasignar" name="mrasignar" onclick="Enviando()">Asignar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-rcierre">
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
        <button type="button" class="btn btn-primary btn-sm" id="mrcierre" name="mrcierre" onclick="Enviando()">Cerrar Solicitud</button>
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