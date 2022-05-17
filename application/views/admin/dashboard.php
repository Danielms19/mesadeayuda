
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                <i class="fa fa-angle-right" aria-hidden="true"></i> Solicitudes de Soporte Técnico
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li class="active">Solicitudes</li>
                </ol>
            </section>


            <section class="content-header">
            <div class="row" >
                <div class="col-md-6">
                    <!-- PRODUCT LIST -->
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                        <center><h3 class="box-title" style="font-size:14px;">Solicitudes de Soporte Técnico Reportadas</h3></center>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped" id="tablaReportadas">
                                <thead>
                                    <tr>
                                        <th style="font-size:12px;">#</th>
                                        <th style="font-size:12px;">Area</th>
                                        <th style="font-size:12px;">Usuario</th>
                                        <th style="font-size:12px;">Descripción</th>
                                        <th style="font-size:12px;">Hora</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php  $n = 1; foreach ($reportadas as $rpt): ?>
                                        <tr>
                                            <td style="font-size:12px;"><?php echo $n++;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_area;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_nombres;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_descripcion;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_fecha_proceso;?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                          <a href="<?php echo base_url();?>mantenimiento/reportadas" class="uppercase">Ver más</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                      <!-- /.box -->
                </div>

                <div class="col-md-6">
                    <!-- PRODUCT LIST -->
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                        <center><h3 class="box-title" style="font-size:14px;">Solicitudes de Soporte Técnico Asignadas</h3></center>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="font-size:12px;">#</th>
                                        <th style="font-size:12px;">Area</th>
                                        <th style="font-size:12px;">Usuario</th>
                                        <th style="font-size:12px;">Descripción</th>
                                        <th style="font-size:12px;">Hora</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php  $n = 1; foreach ($rasignadas as $rpt): ?>
                                        <tr>
                                            <td style="font-size:12px;"><?php echo $n++;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_area;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_nombres;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_descripcion;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_fecha_proceso;?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                          <a href="<?php echo base_url();?>mantenimiento/asignadas" class="uppercase">Ver más</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                      <!-- /.box -->
                </div>
            </div>

            <div class="row">
            <div class="col-md-6">
                    <!-- PRODUCT LIST -->
                    <div class="box box-danger box-solid">
                        <div class="box-header with-border">
                        <center><h3 class="box-title" style="font-size:14px;">Solicitudes de Soporte Técnico Diagnosticadas</h3></center>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped">
                            <thead>
                                    <tr>
                                        <th style="font-size:12px;">#</th>
                                        <th style="font-size:12px;">Area</th>
                                        <th style="font-size:12px;">Usuario</th>
                                        <th style="font-size:12px;">Descripción</th>
                                        <th style="font-size:12px;">Hora</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php  $n = 1; foreach ($rdiagnostico as $rpt): ?>
                                        <tr>
                                            <td style="font-size:12px;"><?php echo $n++;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_area;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_nombres;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_descripcion;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_fecha_proceso;?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                          <a href="<?php echo base_url();?>mantenimiento/diagnosticadas" class="uppercase">Ver más</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                      <!-- /.box -->
                </div>

                <div class="col-md-6">
                    <!-- PRODUCT LIST -->
                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                        <center><h3 class="box-title" style="font-size:14px;">Solicitudes de Soporte Técnico Resueltas</h3></center>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="font-size:12px;">#</th>
                                        <th style="font-size:12px;">Area</th>
                                        <th style="font-size:12px;">Usuario</th>
                                        <th style="font-size:12px;">Descripción</th>
                                        <th style="font-size:12px;">Hora</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php  $n = 1; foreach ($rresueltas as $rpt): ?>
                                        <tr>
                                            <td style="font-size:12px;"><?php echo $n++;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_area;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_nombres;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_descripcion;?></td>
                                            <td style="font-size:12px;"><?php echo $rpt->sl_fecha_proceso;?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                          <a href="<?php echo base_url();?>mantenimiento/resueltas" class="uppercase">Ver más</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                      <!-- /.box -->
                </div>
            </div>

            <div class="row">
            <div class="col-md-6">
                    <!-- PRODUCT LIST -->
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                        <center><h3 class="box-title" style="font-size:14px;">Solicitudes de Soporte Técnico Cerradas</h3></center>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="font-size:12px;">#</th>
                                        <th style="font-size:12px;">Area</th>
                                        <th style="font-size:12px;">Usuario</th>
                                        <th style="font-size:12px;">Descripción</th>
                                        <th style="font-size:12px;">Hora</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php  $n = 1; foreach ($rcerradas as $rc): ?>
                                        <tr>
                                            <td style="font-size:12px;"><?php echo $n++;?></td>
                                            <td style="font-size:12px;"><?php echo $rc->sl_area;?></td>
                                            <td style="font-size:12px;"><?php echo $rc->sl_nombres;?></td>
                                            <td style="font-size:12px;"><?php echo $rc->sl_descripcion;?></td>
                                            <td style="font-size:12px;"><?php echo $rc->sl_fecha_proceso;?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                          <a href="<?php echo base_url();?>mantenimiento/cerradas" class="uppercase">Ver más</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                      <!-- /.box -->
                </div>
            </div>
            </section>
        </div>

        <script>
        setTimeout(function() {	    		
	    	var base_url= "<?php echo base_url();?>";
            var url= base_url + "dashboard"; 
            window.location.href =url;   		
	    },60000);
        </script>