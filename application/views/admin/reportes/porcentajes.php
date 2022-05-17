        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                <i class="fa fa-angle-right" aria-hidden="true"></i> Nuestros porcentajes anuales
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                    <!-- PRODUCT LIST -->
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                        <center><h3 class="box-title" style="font-size:14px;">Porcentaje de atenciones dentro de las 24 horas</h3></center>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example60" class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th style="font-size:12px;">#</th>
                                        <th style="font-size:12px;">Porcentaje</th>
                                        <th style="font-size:12px;">Año</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php $n=1; foreach ($reporte24h as $r1): ?>
                                        <tr>
                                            <td style="font-size:12px;"><?php echo $n++;?></td>
                                            <td style="font-size:12px;"><?php echo $r1->porcentaje;?>%</td>
                                            <td style="font-size:12px;"><?php echo $r1->anios;?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                      <!-- /.box -->
                </div>

                <div class="col-md-6">
                    <!-- PRODUCT LIST -->
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                        <center><h3 class="box-title" style="font-size:14px;">Porcentaje de soportes atendidos dentro de las 24 horas</h3></center>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th style="font-size:12px;">#</th>
                                        <th style="font-size:12px;">Tipo de soporte</th>
                                        <th style="font-size:12px;">Porcentaje</th>
                                        <th style="font-size:12px;">Año</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php $n=1; foreach ($rsoporte24h as $r2): ?>
                                        <tr>
                                            <td style="font-size:12px;"><?php echo $n++;?></td>
                                            <td style="font-size:12px;"><?php echo $r2->nombre;?></td>
                                            <td style="font-size:12px;"><?php echo $r2->porcentaje;?>%</td>
                                            <td style="font-size:12px;"><?php echo $r2->anios;?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-footer -->
                         <div class="box-footer text-center">
                          <a href="<?php echo base_url();?>reportes/Psoporte" class="uppercase">Ver reporte completo</a>
                        </div>
                    </div>
                      <!-- /.box -->
                </div>

                <div class="col-md-6">
                    <!-- PRODUCT LIST -->
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                        <center><h3 class="box-title" style="font-size:14px;">Número de atenciones por tipo de soporte</h3></center>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table  class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th style="font-size:12px;">#</th>
                                        <th style="font-size:12px;">Tipo de soporte</th>
                                        <th style="font-size:12px;">Total</th>
                                        <th style="font-size:12px;">Porcentaje</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php $n=1; foreach ($rsoportet as $r3): ?>
                                        <tr>
                                            <td style="font-size:12px;"><?php echo $n++;?></td>
                                            <td style="font-size:12px;"><?php echo $r3->nombre;?></td>
                                            <td style="font-size:12px;"><?php echo $r3->total;?></td>
                                            <td style="font-size:12px;"><?php echo $r3->anios;?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-footer -->
                         <div class="box-footer text-center">
                          <a href="<?php echo base_url();?>reportes/Natendidas" class="uppercase">Ver reporte completo</a>
                        </div>
                    </div>
                      <!-- /.box -->
                </div>

                </div>