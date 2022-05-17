        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                <i class="fa fa-angle-right" aria-hidden="true"></i> Nuestros indicadores
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $cantTecnicos;?></h3>
                                <p>Tecnicos</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo $cantSolicitudes;?></h3>
                                <p>Solicitudes cerradas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-document-text"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                            <i class="fa fa-bar-chart"></i>
                            <h3 class="box-title">Nuestro reporte de cada mes</h3>

                                <div class="box-tools pull-right">
                                    <select name="year" id="year" class="form-control">
                                        <?php foreach($years as $year):?>
                                            <option value="<?php echo $year->year;?>"><?php echo $year->year;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                             
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="grafico" style="min-width: 310px; height: 450px;margin: 0 auto"></div>
                                    </div>
                                </div>                    
                            </div>                          
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>

        