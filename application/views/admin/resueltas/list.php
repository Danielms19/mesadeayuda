<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <i class="fa fa-angle-right" aria-hidden="true"></i> Solicitudes de Soporte Técnico Resueltas
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
                                    <th style="font-size:12px;" class="text-center">#</th>
                                    <th style="font-size:12px;" class="text-center">Area</th>
                                    <th style="font-size:12px;" class="text-center">Usuario</th>
                                    <th style="font-size:12px;" class="text-center">Descripción</th>
                                    <th style="font-size:12px;" class="text-center">Fecha de Proceso</th>		
                                    <th style="font-size:12px;" class="text-center">Fecha de Asignación</th>		
                                    <th style="font-size:12px;" class="text-center">Fecha de Resolución</th>	
                                    <th style="font-size:12px;" class="text-center">Acciones</th> 
                                </tr>
                            </thead>
                            <tbody >
                                <?php if (!empty($resultadas)): ?>
                                <?php  $n = 1; foreach ($resultadas as $rpt): ?>
                                        <tr>
                                            <td style="font-size:12px;"><?php echo $rpt->id_solicitud;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_area;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_nombres;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_descripcion;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_fecha_proceso;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->as_fecha_asignacion;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->rs_fecha_resolutivo;?></td>
                                            <td>
                                            <div class="btn">                                     
                                                <button type="button" class="btn btn-primary btn-view-rdetalles btn-xs"
                                                id_solicitud="<?php echo $rpt->id_solicitud;?>"  
                                                id_asignacion="<?php echo $rpt->id_asignacion;?>"
                                                id_resolutivo="<?php echo $rpt->id_resolutivo;?>" 
                                                data-toggle="modal" data-target="#modal-rdetalles">
                                                <i class="fa fa-life-ring" aria-hidden="true"></i> Detalles</button> 

                                                <button type="button" class="btn btn-danger btn-view-reditar btn-xs"
                                                id_solicitud="<?php echo $rpt->id_solicitud;?>"  
                                                id_asignacion="<?php echo $rpt->id_asignacion;?>"
                                                id_resolutivo="<?php echo $rpt->id_resolutivo;?>" 
                                                data-toggle="modal" data-target="#modal-reditar">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Resolutivo</button> 

                                                <button type="button" class="btn btn-default btn-view-recierre btn-xs"
                                                id_solicitud="<?php echo $rpt->id_solicitud;?>"  
                                                id_asignacion="<?php echo $rpt->id_asignacion;?>"
                                                id_resolutivo="<?php echo $rpt->id_resolutivo;?>"
                                                data-toggle="modal" data-target="#modal-recierre">
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

<div class="modal fade" id="modal-rdetalles">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" id="mcerrar" name="mcerrar" aria-label="Close">
          <span aria-hidden="true">x</span></button>
        <h3 class="modal-title">Detalles de Soporte</h3>
      </div>
      <div class="modal-body">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-reditar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" id="mcerrar" name="mcerrar" aria-label="Close">
          <span aria-hidden="true">x</span></button>
        <h3 class="modal-title">Modificar Resolutivo</h3>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" id="btnreditar" name="btnreditar">Modificar Resolutivo</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-recierre">
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
        <button type="button" class="btn btn-primary btn-sm" id="btnrecierre" name="btnrecierre">Cerrar Solicitud</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>