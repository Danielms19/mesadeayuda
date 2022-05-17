
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <i class="fa fa-angle-right" aria-hidden="true"></i> Reporte de Atención de Solicitudes
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">Desde:</label>
                              <div class="col-md-3">
                                <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio:'';?>">
                              </div>
                              <label for="" class="col-md-1 control-label">Hasta:</label>
                              <div class="col-md-3">
                                <input type="date" class="form-control" name="fechafin" value="<?php echo !empty($fechafin) ? $fechafin:'';?>">
                              </div>
                              <div class="col-md-4">
                                <input type="submit" class="btn btn-primary" name="buscar" value="Buscar">
                                 <a href="<?php echo base_url();?>reportes/Atendidas" class="btn btn-danger">Restablecer</a>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="" class="col-md-1 control-label">Tecnico:</label>
                              <div class="col-md-3">
                              <select class="form-control" id="tecnico" name="tecnico">
                                <option value="">Seleccione tecnico</option>
                                  <?php foreach ($Tecnicos as $tec) { ?>
                                      <option value="<?php echo $tec->id_tecnico; ?>"><?php echo $tec->tc_nombres." ".$tec->tc_apellidos;?></option>
                                  <?php }?>
                                </select>
                              </div>
                          </div>        
                    </form>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example6" class="table table-bordered table-hover " style="width:100%">
                            <thead>
                                <tr>
                                    <th style="font-size:13px;">#</th>
                                    <th style="font-size:13px;">Area</th>
                                    <th style="font-size:13px;">Usuario</th>
                                    <th style="font-size:13px;">Descripcion</th>
                                    <th style="font-size:13px;">Tipo Soporte</th>
                                    <th style="font-size:13px;">Técnico asignado</th>
                                    <th style="font-size:13px;">Fecha proceso</th>
                                    <th style="font-size:13px;">Fecha asignación</th>
                                    <th style="font-size:13px;">Fecha diagnostico</th>
                                    <th style="font-size:13px;">Fecha resolutivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($rate)):?>
                                    <?php $i=1; foreach($rate as $ra):?>
                                        <tr >
                                              <td style="font-size:13px;"><?php echo $i++?></td>
                                              <td style="font-size:13px;"><?php echo $ra->sl_area ?></td>
                                              <td style="font-size:13px;"><?php echo $ra->sl_nombres ?></td>
                                              <td style="font-size:13px;"><?php echo $ra->sl_descripcion ?></td>
                                              <td style="font-size:13px;"><?php echo $ra->ts_nombre ?></td>
                                              <?php if($ra->id_tecnico==null){?>
                                                <td style="font-size:13px;"><?php echo "Sin. Técnico"?></td>
                                                <?php }else{?>
                                              <td style="font-size:13px;"><?php echo $ra->tc_nombres." ".$ra->tc_apellidos ?></td>
                                              <?php }?>
                                                
                                                
                                                <?php if($ra->sl_fecha_proceso==null){?>
                                                <td style="font-size:13px;"><?php echo "Sin. Fecha"?></td>
                                                <?php }else{?>
                                                <td style="font-size:13px;"><?php echo $ra->sl_fecha_proceso;?></td>
                                                <?php }?>

                                                <?php if($ra->as_fecha_asignacion==null){?>
                                                <td style="font-size:13px;"><?php echo "Sin. Fecha"?></td>
                                                <?php }else{?>
                                                <td style="font-size:13px;"><?php echo $ra->as_fecha_asignacion;?></td>
                                                <?php }?>

                                                <?php if($ra->dg_fecha_diagnostico==null){?>
                                                    <td style="font-size:13px;"><?php echo "Sin. Fecha"?></td>
                                                <?php }else{?>
                                                <td style="font-size:13px;"><?php echo $ra->dg_fecha_diagnostico;?></td>
                                                <?php }?>

                                                <?php if($ra->rs_fecha_resolutivo==null){?>
                                                    <td style="font-size:13px;"><?php echo "Sin. Fecha"?></td>
                                                <?php }else{?>
                                                <td style="font-size:13px;"><?php echo $ra->rs_fecha_resolutivo;?></td>
                                                <?php }?>
                                          </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
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