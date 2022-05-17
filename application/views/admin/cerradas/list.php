<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <i class="fa fa-angle-right" aria-hidden="true"></i> Solicitudes de Soporte Técnico Cerradas
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
                                    <th style="font-size:12px;">Fecha Proceso</th>
                                    <th style="font-size:12px;">Fecha Asignación</th>
                                    <th style="font-size:12px;">Fecha Diagnostico</th>
                                    <th style="font-size:12px;">Fecha Resolutivo</th>
                                    <th style="font-size:12px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php if (!empty($cerradas)): ?>
                                <?php  $n = 1; foreach ($cerradas as $rpt): ?>
                                        <tr>
                                            <td style="font-size:12px;"><?php echo $n++;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_area;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_nombres;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_descripcion;?></td>
                                            
                                            <?php if($rpt->sl_fecha_proceso==null){?>
                                                <td style="font-size:12px;"><?php echo "Sin. Fecha"?></td>
                                            <?php }else{?>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_fecha_proceso;?></td>
                                            <?php }?>

                                            <?php if($rpt->as_fecha_asignacion==null){?>
                                            <td style="font-size:12px;"><?php echo "Sin. Fecha"?></td>
                                            <?php }else{?>
                                            <td style="font-size:12px;"><?php echo $rpt->as_fecha_asignacion;?></td>
                                            <?php }?>

                                            <?php if($rpt->dg_fecha_diagnostico==null){?>
                                                <td style="font-size:12px;"><?php echo "Sin. Fecha"?></td>
                                            <?php }else{?>
                                            <td style="font-size:12px;"><?php echo $rpt->dg_fecha_diagnostico;?></td>
                                            <?php }?>

                                            <?php if($rpt->rs_fecha_resolutivo==null){?>
                                                <td style="font-size:12px;"><?php echo "Sin. Fecha"?></td>
                                            <?php }else{?>
                                            <td style="font-size:12px;"><?php echo $rpt->rs_fecha_resolutivo;?></td>
                                            <?php }?>

                                            <td>
                                                <div class="btn">                                     
                                                    <button type="button" class="btn btn-primary btn-view-cdetalle btn-xs" 
                                                    id_solicitud="<?php echo $rpt->id_solicitud;?>" data-toggle="modal" 
                                                    data-target="#modal-cdetalle"><i class="fa fa-life-ring" aria-hidden="true">
                                                    </i> Detalle</button> 
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

<div class="modal fade" id="modal-cdetalle">
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

<script>
        setTimeout(function() {	    		
	    	var base_url= "<?php echo base_url();?>";
            var url= base_url + "mantenimiento/cerradas"; 

	    	$("#tablaReportadas").load(url)
	    		
	    },15000);
        </script>